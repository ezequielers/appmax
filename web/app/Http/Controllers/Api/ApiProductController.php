<?php

namespace App\Http\Controllers\Api;

use App\Helpers\SkuHelper;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();

        if($products->isEmpty()) {
            return response()->json([
                'code' => 200,
                'message' => trans('common.No records found')
            ]);
        }

        return response()->json($products, 200);
    }

    /**
     * Store User
     * @param $request Request
     * @return JsonResponse
     */
    public function store (Request $request)
    {
        $rules = [
            'pro_name' => 'required|max:255',
            'pro_price' => 'required|numeric',
            'pro_amount' => 'required|integer',
            'pro_status' => 'required|boolean'
        ];

        $messages = [
            'pro_name.required' => 'Name is required',
            'pro_name.max'  => 'Maximum of :max characters',
            'pro_price.required' => 'Price is required',
            'pro_price.numeric'  => 'Please inform a numeric value',
            'pro_amount.required' => 'Amount is required',
            'pro_amount.integer'  => 'Please inform an integer value',
            'pro_status.required' => 'Status is required',
            'pro_status.boolean'  => 'Please inform true, false, 0, 1, \'0\' or \'1\''
        ];

        $modelProduct = $request->all();
        $modelProduct['pro_sku'] = SkuHelper::generateSKU();
        $modelProduct['pro_origin'] = 'api';

        $product = Product::create($modelProduct);

        return response()->json($product, 201);
    }

    /**
     * @param $request Request
     * @param int $id
     * @return JsonResponse
     */
    public function decrement (Request $request, int $id)
    {
        try
        {
            $product = Product::findOrFail($id);

            // Valida se existe a quantia solicitada em estoque
            if($request->pro_amount > $product->pro_amount)
            {
                return response()->json([
                    'code' => 501,
                    'message' => trans('common.You tried decrease more products than are in stock.')
                ]);
            }

            $product->pro_amount -= $request->pro_amount;
            $product->save();

            return response()->json([
                'code' => 200,
                'message' => trans('common.Stock decreased successfully!')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 501,
                'message' => trans('common.An error occurred while trying to decrement product.')
            ]);
        }
    }
}
