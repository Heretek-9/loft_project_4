<?php

namespace App\Http\Controllers\_Public;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show($cat_name)
    {
    	$category = Category::where('url', '=', $cat_name)->first();
    	if (!$category) {
    		abort(404);
    	}

    	$category = $category->getAttributes();

        $products = Product::where('category_id', '=', $category['id'])->get()->toArray();

        $menuCategories = Category::select('url', 'title')->get()->toArray();
        $randomProduct = Product::with('category')->take(1)->inRandomOrder()->get()->toArray();

        return view('category', ['menuCategories' => $menuCategories, 'randomProduct' => $randomProduct[0], 'category' => $category, 'products' => $products]);
    }
}
