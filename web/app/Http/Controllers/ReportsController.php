<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Support\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->breadcrumbs = [
            trans('common.Reports')
        ];
    }

    public function daily()
    {
        $serviceProducts = new ProductService();
        $now = Carbon::now();
        $dateNow = date('d/m/Y', strtotime($now->toDateString()));
        $dateStart = $now->toDateString()." 00:00:00";
        $dateEnd = $now->toDateString()." 23:59:59";

        $getCreatedBetweenDate = $serviceProducts->getCreatedBetweenDate($dateStart, $dateEnd);
        $getDeletedBetweenDate = $serviceProducts->getDeletedBetweenDate($dateStart, $dateEnd);
        $getSystemInsertedBetweenDate = $serviceProducts->getInsertedBetweenDate('system', $dateStart, $dateEnd);
        $getApiInsertedBetweenDate = $serviceProducts->getInsertedBetweenDate('api', $dateStart, $dateEnd);

        return view('reports.daily', [
            'breadcrumbs' => $this->breadcrumbs,
            'dateNow' => $dateNow,
            'getCreatedBetweenDate' => $getCreatedBetweenDate,
            'getDeletedBetweenDate' => $getDeletedBetweenDate,
            'getSystemInsertedBetweenDate' => $getSystemInsertedBetweenDate,
            'getApiInsertedBetweenDate' => $getApiInsertedBetweenDate
        ]);
    }

    public function stock()
    {
        $serviceProducts = new ProductService();
        $getAllLowStock = $serviceProducts->getAllLowStock();

        return view('reports.stock', [
            'breadcrumbs' => $this->breadcrumbs,
            'getAllLowStock' => $getAllLowStock
        ]);
    }
}
