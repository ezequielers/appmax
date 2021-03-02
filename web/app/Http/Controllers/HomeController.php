<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->breadcrumbs = [];
    }
    public function index ()
    {
        $serviceProduct = new ProductService();
        $gettAllWithActive = $serviceProduct->getAllActive();
        $getAllWithLowStock = $serviceProduct->getAllLowStock();
        $getLastFiveProducts = $serviceProduct->getLastProducts(4);

        return view('dashboard', [
            'breadcrumbs' => $this->breadcrumbs,
            'gettAllWithActive' => $gettAllWithActive,
            'getAllWithLowStock' => $getAllWithLowStock,
            'getLastFiveProducts' => $getLastFiveProducts
        ]);
    }
}
