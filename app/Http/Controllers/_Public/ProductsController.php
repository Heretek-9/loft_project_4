<?php

namespace App\Http\Controllers\_Public;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function show($cat_name, $prod_name)
    {
        $category = Category::where('url', '=', $cat_name)->first();
    	if (!$category) {
    		abort(404);
    	}

    	$category = $category->getAttributes();

        $product = Product::where('category_id', '=', $category['id'])->where('url', '=', $prod_name)->first();

        if (!$product) {
    		abort(404);
    	}

    	$product = $product->getAttributes();

        $relatedProducts = Product::with('category')->take(3)->inRandomOrder()->get()->toArray();
    	
        $menuCategories = Category::select('url', 'title')->get()->toArray();
        $randomProduct = Product::with('category')->take(1)->inRandomOrder()->get()->toArray();

        return view('product', [
            'menuCategories' => $menuCategories, 
            'randomProduct' => $randomProduct[0], 
            'category' => $category, 
            'product' => $product, 
            'relatedProducts' => $relatedProducts
        ]);
    }
}
