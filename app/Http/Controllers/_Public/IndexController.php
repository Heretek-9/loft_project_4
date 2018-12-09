<?php

namespace App\Http\Controllers\_Public;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        $menuCategories = Category::select('url', 'title')->get()->toArray();
        $randomProduct = Product::with('category')->take(1)->inRandomOrder()->get()->toArray();

        $products = Product::with('category')->limit(6)->get()->toArray();
        return view('index', ['menuCategories' => $menuCategories, 'randomProduct' => $randomProduct[0], 'products' => $products]);
    }
}