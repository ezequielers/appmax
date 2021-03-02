<?php

namespace App\Http\Controllers;

use App\Helpers\SkuHelper;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->breadcrumbs = [
            trans('common.Products')
        ];
    }

    /**
     * Page to list products registered in system
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index ()
    {
        $products = Product::all();
        return view('products.products', [
            'breadcrumbs' => $this->breadcrumbs,
            'products' => $products
        ]);
    }

    /**
     * Page to create a new Product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create ()
    {
        $this->breadcrumbs = [
            trans('common.Edit Product') => route('admin.products.list')
        ] + $this->breadcrumbs;
        $isEdit = false;
        $product = new Product();
        $product['pro_sku'] = SkuHelper::generateSKU();
        $data = [
            'breadcrumbs' => $this->breadcrumbs,
            'product' => $product,
            'isEdit' => $isEdit
        ];
        return view('products.productsEdit', $data);
    }

    /**
     * Page to Edit an existing User
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit ($id)
    {
        $this->breadcrumbs = [trans('common.Edit Products') => route('admin.products.list')] + $this->breadcrumbs;
        $product = Product::findOrFail($id);
        $isEdit = true;
        $data = [
            'breadcrumbs' => $this->breadcrumbs,
            'product' => $product,
            'isEdit' => $isEdit
        ];
        return view('products.productsEdit', $data);
    }

    /**
     * Store User
     * @param $request ProductRequest
     * @return RedirectResponse
     */
    public function store (ProductRequest $request)
    {
        $input = $request->except('_token');
        $ok = Product::create($input);
        return redirect()->route('admin.products.list');
    }

    /**
     * Update User
     * @param $request ProductRequest
     * @return RedirectResponse
     */
    public function update (ProductRequest $request, $id)
    {
        $input = $request->except('_token');
        $ok = Product::whereProId($id)->update($input);
        return redirect()->route('admin.products.list');
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function delete ($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.list');
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
