<?php

namespace App\Http\Controllers;

use App\Services\Billers\BillerService;
use App\Services\Products\ProductService;

class ProductController extends Controller
{
    public function categoryPrepaidShow($categorySlug, ProductService $productService)
    {
        $data = $productService->getPrepaidProducts($categorySlug);

        if (blank($data)) {
            abort(404);
        }

        $brands = $data[0]['brands'];

        return view('products.category-show', compact('brands', 'categorySlug'));
    }
}
