<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = \App\Models\Category::with('parent')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Chỉ lấy danh mục cha (parent_id = null)
        $parents = Category::whereNull('parent_id')->get();
        return view('admin.category.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $slug = $request->slug ?: Str::slug($request->name);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/backend/images/category'), $fileName);
            $imagePath = 'assets/backend/images/category/' . $fileName; // ✅ sửa đường dẫn
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $request->description,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        // Lấy sản phẩm theo danh mục, truyền ra view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Không cho chọn chính nó hoặc danh mục con làm cha
        $parents = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('admin.category.edit', compact('category', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        $slug = $request->slug ?: Str::slug($request->name);
        $imagePath = $category->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/backend/images/category'), $fileName);
            $imagePath = 'assets/backend/images/category/' . $fileName; // ✅ sửa đường dẫn
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $request->description,
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục thành công');
    }

    // Quản lý danh mục con
    public function subcategories()
    {
        $categories = \App\Models\Category::whereNotNull('parent_id')->with('parent')->get();
        return view('admin.category.subcategories', compact('categories'));
    }
}
