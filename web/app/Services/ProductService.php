<?php

namespace App\Services;

use App\Models\Product;

class ProductService extends BaseService
{
    public function getAllActive()
    {
        return Product::query()
            ->where('pro_status', 1)
            ->get();
    }

    public function getAllLowStock()
    {
        return Product::query()
            ->where('pro_status', 1)
            ->where('pro_amount', '<', 100)
            ->get();
    }

    public function getLastProducts($quantity = 7)
    {
        return Product::query()
            ->orderBy('created_at', 'desc')
            ->take($quantity)
            ->get();
    }

    public function getCreatedBetweenDate($dateStart, $dateEnd)
    {
        return Product::query()
            ->whereBetween('created_at', [$dateStart, $dateEnd])
            ->orderBy('created_at', 'desc')
            ->withTrashed()
            ->get();
    }

    public function getDeletedBetweenDate($dateStart, $dateEnd)
    {
        return Product::query()
            ->whereBetween('deleted_at', [$dateStart, $dateEnd])
            ->orderBy('deleted_at', 'desc')
            ->withTrashed()
            ->get();
    }

    public function getInsertedBetweenDate($entry, $dateStart, $dateEnd)
    {
        return Product::query()
            ->where('pro_origin', $entry)
            ->whereBetween('created_at', [$dateStart, $dateEnd])
            ->withTrashed()
            ->get();
    }
}
