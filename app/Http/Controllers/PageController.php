<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($slug, Request $request)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.show', compact('page'));
    }
}
