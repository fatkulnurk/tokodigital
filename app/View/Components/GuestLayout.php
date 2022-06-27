<?php

namespace App\View\Components;

use App\Models\Page;
use App\Services\Billers\BillerService;
use App\Services\Products\ProductService;
use Illuminate\Support\Facades\Auth;
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

        $pages = [];
        if (Auth::check()) {
            $pages = cache()->remember('layouts.pages', 10, function () {
                return Page::get();
            });
        }

        return view('layouts.guest', [
            'categories' => $categories,
            'pages' => $pages
        ]);
    }
}
