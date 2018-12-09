<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('admin.categories.index', $data);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required'
        ]);

        $saveArr = [];
        $saveArr['title'] = $request->get('title');
        $saveArr['description'] = $request->get('description')??'';
        $saveArr['url'] = $request->get('url');

        Category::create($saveArr);

        return redirect(route('categories.index'));
    }

    public function update(category $category, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'url' => 'required'
        ]);

        $saveArr = [];
        $saveArr['title'] = $request->get('title');
        $saveArr['description'] = $request->get('description')??'';
        $saveArr['url'] = $request->get('url');

        $category->update($saveArr);
        return redirect(route('categories.index'));
    }

    public function edit(category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function destroy(category $category)
    {
        $category->delete();
        return redirect(route('categories.index'));
    }
}
