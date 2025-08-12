<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function detail($slug)
    {
        $product = \App\Models\Product::with('attribute')->where('slug', $slug)->firstOrFail();
        return view('Ecom.product.product_detail', compact('product'));
    }
    public function all(Request $request)
    {
        $query = \App\Models\Product::with('attribute', 'category', 'galleries');

        // Nếu có category trên URL thì lọc
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $products = $query->paginate(12);

        $categories = \App\Models\Category::withCount('products')->get();
        $colors = \App\Models\ProductAttribute::where('group_id', 1)->get(); // group_id=1 là màu sắc

        return view('Ecom.product.product_all', compact('products', 'categories', 'colors'));
    }
    public function filter(Request $request)
    {
        $query = \App\Models\Product::query();

        // Filter theo danh mục
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter theo màu sắc
        if ($request->filled('color')) {
            $query->whereIn('attribute_id', (array)$request->color);
        }

        // Filter theo giá
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
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

        // Xử lý sắp xếp
        $sort = $request->input('sort', 'all');
        switch ($sort) {
            case 'best-selling':
                $query->orderByDesc('sold'); // hoặc trường bán chạy của bạn
                break;
            case 'a-z':
                $query->orderBy('name', 'asc');
                break;
            case 'z-a':
                $query->orderBy('name', 'desc');
                break;
            case 'price-low-high':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high-low':
                $query->orderBy('price', 'desc');
                break;
            case 'all':
            default:
                $query->orderBy('created_at', 'desc'); // hoặc để nguyên không orderBy nếu muốn mặc định
                break;
        }

        $products = $query->with('attribute', 'category', 'galleries')->paginate(12);

        $categories = \App\Models\Category::withCount('products')->get();
        $colors = \App\Models\ProductAttribute::where('group_id', 1)->get();

        return view('Ecom.product.product_all', compact('products', 'categories', 'colors'));
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
    public function search(Request $request)
    {
        $q = trim($request->input('q'));

        $products = Product::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', $q)
                        ->orWhere('sku', $q);
                });
            })
            ->take(12)
            ->get();

        return response()->json([
            'html' => view('Ecom.partials.search_results', compact('products'))->render()
        ]);
    }

    public function autocomplete(Request $request)
    {
        $q = trim($request->input('q'));

        $products = Product::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', '%' . $q . '%')
                        ->orWhere('sku', 'like', '%' . $q . '%');
                });
            })
            ->take(8)
            ->get(['id', 'name', 'slug', 'main_image', 'price', 'sale_price']);

        return response()->json($products);
    }
    public function quickview($id)
    {
        $product = Product::with('attribute', 'category', 'galleries')->findOrFail($id);
        return response()->json([
            'html' => view('Ecom.partials.quickview', compact('product'))->render()
        ]);
    }
}