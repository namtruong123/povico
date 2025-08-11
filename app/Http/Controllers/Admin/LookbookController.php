<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lookbook;

class LookbookController extends Controller
{
    // Hiển thị danh sách Lookbook
    public function index()
    {
        $lookbooks = Lookbook::latest()->paginate(10);
        return view('admin.lookbooks.index', compact('lookbooks'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('admin.lookbooks.create');
    }

    // Lưu Lookbook mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_link' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'position' => 'nullable|string|max:50',
        ]);

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/lookbooks', 'public');
        }
        if ($request->hasFile('hover_image')) {
            $data['hover_image'] = $request->file('hover_image')->store('uploads/lookbooks', 'public');
        }

        Lookbook::create($data);
        return redirect()->route('admin.lookbooks.index')->with('success', 'Thêm Lookbook thành công!');
    }

    // Hiển thị form chỉnh sửa
    public function edit(Lookbook $lookbook)
    {
        return view('admin.lookbooks.edit', compact('lookbook'));
    }

    public function update(Request $request, Lookbook $lookbook)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_link' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
            'position' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/lookbooks', 'public');
        }
        if ($request->hasFile('hover_image')) {
            $data['hover_image'] = $request->file('hover_image')->store('uploads/lookbooks', 'public');
        }

        $lookbook->update($data);
        return redirect()->route('admin.lookbooks.index')->with('success', 'Cập nhật Lookbook thành công!');
    }

    public function destroy(Lookbook $lookbook)
    {
        $lookbook->delete();
        return redirect()->route('admin.lookbooks.index')->with('success', 'Đã xóa Lookbook!');
    }
}
