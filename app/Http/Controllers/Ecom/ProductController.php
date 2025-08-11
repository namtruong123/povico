<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product = \App\Models\Product::with('attribute')->where('slug', $slug)->firstOrFail();
        return view('Ecom.product.product_detail', compact('product'));
    }
    public function all()
    {
        $products = \App\Models\Product::with('attribute', 'category', 'galleries')->paginate(12);
        return view('Ecom.product.product_all', compact('products'));
    }
    public function filter(Request $request)
    {
        $query = \App\Models\Product::query();

        // Filter theo danh mục
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter theo chất liệu
        if ($request->filled('material')) {
            $query->whereIn('attribute_id', (array)$request->material);
        }

        // Filter theo màu sắc
        if ($request->filled('color')) {
            $query->whereIn('attribute_id', (array)$request->color);
        }

        // Filter theo giá
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter theo trạng thái
        if ($request->filled('is_new')) {
            $query->where('is_new', 1);
        }
        if ($request->filled('is_best_seller')) {
            $query->where('is_best_seller', 1);
        }
        if ($request->filled('availability')) {
            if ($request->availability == 'inStock') {
                $query->where('quantity', '>', 0);
            } elseif ($request->availability == 'outStock') {
                $query->where('quantity', '<=', 0);
            }
        }

        $products = $query->with('attribute', 'category', 'galleries')->paginate(12);

        $categories = \App\Models\Category::all();
        $materials = \App\Models\ProductAttribute::where('group_id', 1)->get();
        $colors = \App\Models\ProductAttribute::where('group_id', 2)->get();

        return view('Ecom.product.product_all', compact('products', 'categories', 'materials', 'colors'));
    }
    public function pagination()
    {
        $products = \App\Models\Product::with('attribute', 'category', 'galleries')->paginate(12);
        return view('Ecom.product.product_all', compact('products'));
    }
    public function loadmore(Request $request)
    {
        $page = $request->get('page', 1);
        $products = \App\Models\Product::with('attribute', 'category', 'galleries')->paginate(12, ['*'], 'page', $page);

        // Nếu là request AJAX thì trả về JSON
        if ($request->ajax()) {
            return response()->json([
                'html' => view('Ecom.product.partials.product_list', compact('products'))->render(),
                'next_page' => $products->currentPage() < $products->lastPage() ? $products->currentPage() + 1 : null,
            ]);
        }

        // Nếu là request thường thì trả về view đầy đủ
        return view('Ecom.product.product_all', compact('products'));
    }
    public function infinite(Request $request)
    {
        $page = $request->get('page', 1);
        $products = \App\Models\Product::with('attribute', 'category', 'galleries')->paginate(12, ['*'], 'page', $page);

        // Nếu là request AJAX thì trả về HTML sản phẩm và thông tin phân trang
        if ($request->ajax()) {
            return response()->json([
                'html' => view('Ecom.product.partials.product_list', compact('products'))->render(),
                'has_more' => $products->currentPage() < $products->lastPage(),
                'next_page' => $products->currentPage() + 1,
            ]);
        }

        // Nếu là request thường thì trả về view đầy đủ
        return view('Ecom.product.product_all', compact('products'));
    }
    public function style($style)
    {
        // Tùy biến truy vấn theo style, ví dụ:
        $query = \App\Models\Product::with('attribute', 'category', 'galleries');
        // Bạn có thể xử lý style ở đây, ví dụ lọc theo kiểu sản phẩm
        // if ($style == 1) { ... }

        $products = $query->paginate(12);
        return view('Ecom.product.product_all', compact('products', 'style'));
    }
}