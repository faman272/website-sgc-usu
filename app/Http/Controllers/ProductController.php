<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    // Show Product with slug
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('shop.pages.detail-product', compact('product'));
    }

}
