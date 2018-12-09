<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('category')->get();
        return view('admin.products.index', $data);
    }

    public function create()
    {
        return view('admin.products.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'category_id' => 'required',
            'price' => 'numeric',
        ]);

        $saveArr = [];
        $saveArr['title'] = $request->get('title');
        $saveArr['description'] = $request->get('description')??'';
        $saveArr['url'] = $request->get('url');
        $saveArr['category_id'] = $request->get('category_id');
        $saveArr['price'] = $request->get('price')??0;
        $photo = $this->savePhoto();
        if ($photo) {
        	$saveArr['photo'] = $photo;
        }
        
        Product::create($saveArr);

        return redirect(route('products.index'));
    }

    public function update(product $product, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required',
            'category_id' => 'required',
            'price' => 'numeric',
        ]);

        $saveArr = [];
        $saveArr['title'] = $request->get('title');
        $saveArr['description'] = $request->get('description')??'';
        $saveArr['url'] = $request->get('url');
        $saveArr['category_id'] = $request->get('category_id');
        $saveArr['price'] = $request->get('price')??0;
        $photo = $this->savePhoto($product);
        if ($photo) {
        	$saveArr['photo'] = $photo;
        }

        $product->update($saveArr);
        return redirect(route('products.index'));
    }

    public function edit(product $product)
    {
        return view('admin.products.edit', ['product' => $product, 'categories' => Category::all()]);
    }

    public function destroy(product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }

    public function savePhoto($product = null)
    {
    	if ($_FILES['photo']['tmp_name'] && $_FILES['photo']['error'] === 0) {
    		$folder = public_path().DIRECTORY_SEPARATOR.'prod_img';
			$filename = explode('.', $_FILES['photo']['name']);
			$filename[(count($filename)-2)] .= '_'.time();
			$filename = implode('.', $filename);
			if (!is_dir($folder)) {
				mkdir($folder);
			}

			if (move_uploaded_file($_FILES['photo']['tmp_name'], $folder.DIRECTORY_SEPARATOR.$filename)) {
				if ($product && $product->getOriginal()['photo'] && is_file($folder.DIRECTORY_SEPARATOR.$product->getOriginal()['photo'])) {
					unlink($folder.DIRECTORY_SEPARATOR.$product->getOriginal()['photo']);
				}
				return $filename;
			}
		}
		return '';
    }
}
