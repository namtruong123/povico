<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductAttributeGroup;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'attributeGroup', 'attribute')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $attributeGroups = ProductAttributeGroup::all();
        $attributes = \App\Models\ProductAttribute::all(); // THÊM DÒNG NÀY
        return view('admin.products.create', compact('categories', 'attributeGroups', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'slug' => 'nullable|unique:products,slug',
            'category_id' => 'required|exists:categories,id',
            'attribute_group_id' => 'nullable|exists:product_attribute_groups,id',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable',
            'specifications' => 'nullable',
            'is_favorite' => 'nullable|boolean',
            'is_new' => 'nullable|boolean',
            'is_best_seller' => 'nullable|boolean',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Xử lý ảnh chính
        $mainImagePath = null;
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/backend/images/products'), $fileName);
            $mainImagePath = 'assets/backend/images/products/' . $fileName;
        }

        $product = Product::create([
            'name' => $request->name,
            'sku' => $request->sku,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'attribute_group_id' => $request->attribute_group_id,
            'attribute_id' => $request->attribute_id, // THÊM DÒNG NÀY
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'main_image' => $mainImagePath,
            'description' => $request->description,
            'specifications' => $request->specifications,
            'is_favorite' => $request->is_favorite ?? false,
            'is_new' => $request->is_new ?? false,
            'is_best_seller' => $request->is_best_seller ?? false,
        ]);

        // Xử lý gallery
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $fileName = time() . '_' . $galleryImage->getClientOriginalName();
                $galleryImage->move(public_path('assets/backend/images/products/gallery'), $fileName);
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => 'assets/backend/images/products/gallery/' . $fileName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with('category', 'attributeGroup', 'galleries')->findOrFail($id);
        $categories = Category::all();
        $attributeGroups = ProductAttributeGroup::all();
        $attributes = \App\Models\ProductAttribute::all(); // THÊM DÒNG NÀY
        return view('admin.products.edit', compact('product', 'categories', 'attributeGroups', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'slug' => 'nullable|unique:products,slug,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'attribute_group_id' => 'nullable|exists:product_attribute_groups,id',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'quantity' => 'required|integer',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'nullable',
            'specifications' => 'nullable',
            'is_favorite' => 'nullable|boolean',
            'is_new' => 'nullable|boolean',
            'is_best_seller' => 'nullable|boolean',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        // Xử lý ảnh chính
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/backend/images/products'), $fileName);
            $product->main_image = 'assets/backend/images/products/' . $fileName;
        }

        $product->update([
            'name' => $request->name,
            'sku' => $request->sku,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'attribute_group_id' => $request->attribute_group_id,
            'attribute_id' => $request->attribute_id, // THÊM DÒNG NÀY
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'specifications' => $request->specifications,
            'is_favorite' => $request->is_favorite ?? false,
            'is_new' => $request->is_new ?? false,
            'is_best_seller' => $request->is_best_seller ?? false,
        ]);

        // Xử lý gallery mới
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $fileName = time() . '_' . $galleryImage->getClientOriginalName();
                $galleryImage->move(public_path('assets/backend/images/products/gallery'), $fileName);
                ProductGallery::create([
                    'product_id' => $product->id,
                    'image' => 'assets/backend/images/products/gallery/' . $fileName,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh gallery nếu có
        foreach ($product->galleries ?? [] as $gallery) {
            if (file_exists(public_path($gallery->image))) {
                @unlink(public_path($gallery->image));
            }
            $gallery->delete();
        }

        // Xóa ảnh chính nếu có
        if ($product->main_image && file_exists(public_path($product->main_image))) {
            @unlink(public_path($product->main_image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Đã xóa sản phẩm thành công');
    }

    public function deleteGallery($id)
    {
        $gallery = ProductGallery::findOrFail($id);
        $gallery->delete();
        return back()->with('success', 'Đã xóa ảnh gallery');
    }
}
