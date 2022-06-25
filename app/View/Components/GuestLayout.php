<?php

namespace App\View\Components;

use App\Services\Billers\BillerService;
use App\Services\Products\ProductService;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $categories = cache()->remember('categories', 600, function () {
           return (new ProductService())->getCategories();
        });

        return view('layouts.guest', [
            'categories' => $categories
        ]);
    }
}
