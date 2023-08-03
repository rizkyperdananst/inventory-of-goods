<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $categoryRequest)
    {
        $validated = $categoryRequest->validated();

        $category = Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Data Kategori Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $c = Category::find($id);

        return view('admin.category.edit', compact('c'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $validated = $categoryRequest->validated();

        $category = Category::find($id)->update($validated);

        return redirect()->route('category.index')->with('success', 'Data Kategori Berhasil di Update');
    }

    public function destroy($id)
    {
        $category = Category::find($id)->delete();

        return redirect()->route('category.index')->with('success', 'Data Kategori Berhasil di Hapus');
    }
}
