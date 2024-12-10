<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Hiển thị danh sách danh mục thực đơn
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * View tạo danh mục
     */
    public function create()
    {

        return view('admin.categories.create');
    }

    /**
     * Tạo danh mục mới
     */
    public function store(CategoryStoreRequest $request)
    {

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * View chỉnh sửa danh mục
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Chỉnh sửa danh mục
     */
    public function update(Request $request, Category  $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return to_route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Xóa danh mục
     */
    public function destroy(Category $category)
    {
        $category->menus()->detach();
        $category->delete();
        return to_route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
