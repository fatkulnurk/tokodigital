<?php

namespace App\Services\Products;

use App\Models\Product;

class ProductService
{
    private int $ttl = 60;

    public function getCategories()
    {
        return cache()->remember('ProductService.getCategories', $this->ttl, function () {
            $categories = Product::select(['category', 'category_slug'])
                ->distinct()
                ->orderBy('category')
                ->get();

            return (!blank($categories)) ? $categories->toArray(): [];
        });
    }

    public function getPrepaidProducts(mixed $categorySlug = '', mixed $brandSlug = '', bool $expand = true): array
    {
        $md5 = http_build_query([
            'category_slug' => $categorySlug,
            'brand_slug' => $brandSlug,
            'expand' => $expand
        ]);

        return cache()->remember('ProductService.getProducts' . $md5, $this->ttl, function () use (
            $categorySlug,
            $brandSlug,
            $expand
        ) {
            $products = Product::prepaid()
                ->when(!blank($categorySlug), function ($query) use ($categorySlug) {
                    return $query->where('category_slug', $categorySlug);
                })->when(!blank($brandSlug), function ($query) use ($brandSlug) {
                    return $query->where('brand_slug', $brandSlug);
                })->orderByDesc('cluster')->orderBy('category_slug')->get();

            if ($expand) {
                $items = $products->groupBy('category_slug');
                $results = [];
                foreach ($items as $key => $item) {
                    $brands = [];
                    foreach (collect($item)->groupBy('brand_slug') as $brandSlug => $brandTypes) {
                        $types = [];
                        foreach (collect($brandTypes)->groupBy('type_slug') as $brandTypeSlug => $products) {
                            $types[] = [
                                'type_slug' => $brandTypeSlug,
                                'products' => collect($products)->sortBy('price')->values()
                            ];
                        }

                        $brands[] = [
                            'brand_slug' => $brandSlug,
                            'types' => $types
                        ];
                    }

                    $results[] = [
                        'category_slug' => $key,
                        'brands' => $brands
                    ];
                }

                return $results;
            }

            return $products;
        });
    }

    public function getBrands(mixed $categorySlug = '')
    {
        return cache()->remember('ProductService.getCategories' . $categorySlug, $this->ttl, function () use ($categorySlug) {
            $categories = Product::select(['brand', 'brand_slug', 'category_slug'])
                ->where('category_slug', $categorySlug ?? '')
                ->distinct()
                ->orderBy('brand')
                ->get();

            return (!blank($categories)) ? $categories->toArray(): [];
        });
    }

    public function getProducts(mixed $categorySlug, mixed $brandSlug, bool $expand = true)
    {
        $md5 = http_build_query([
            'category_slug' => $categorySlug,
            'brand_slug' => $brandSlug,
            'expand' => $expand
        ]);

        $products = cache()->remember($md5, $this->ttl, function () use (
            $categorySlug,
            $brandSlug,
            $expand
        ) {
            $products = Product::prepaid()
                ->when(!blank($categorySlug), function ($query) use ($categorySlug) {
                    return $query->where('category_slug', $categorySlug);
                })->when(!blank($brandSlug), function ($query) use ($brandSlug) {
                    return $query->where('brand_slug', $brandSlug);
                })->orderByDesc('cluster')
                ->orderBy('category_slug')
                ->get();

            if ($expand) {
                $results = [];

                foreach ($products->groupBy('type_slug') as $brandTypeSlug => $products) {
                    $results[] = [
                        'type_slug' => $brandTypeSlug,
                        'products' => collect($products)->sortBy('price')->values()
                    ];
                }

                return $results;
            }

            return $products;
        });

        return $products;
    }

    public function getProduct(string $productId)
    {
        $product = cache()->remember(md5($productId), $this->ttl * 5, function () use ($productId) {
            return Product::where('id', $productId)->first();
        });

        return $product ?? [];
    }
}