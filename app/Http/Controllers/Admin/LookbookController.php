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
            'position' => 'nullable|string|max:255',
        ]);

        // Upload ảnh vào public/assets/backend/images/lookbooks
        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('assets/backend/images/lookbooks'), $imageName);
            $data['image'] = 'assets/backend/images/lookbooks/' . $imageName;
        }
        if ($request->hasFile('hover_image')) {
            $hoverImageName = time().'_hover_'.uniqid().'.'.$request->hover_image->extension();
            $request->hover_image->move(public_path('assets/backend/images/lookbooks'), $hoverImageName);
            $data['hover_image'] = 'assets/backend/images/lookbooks/' . $hoverImageName;
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
            'position' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'_'.uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('assets/backend/images/lookbooks'), $imageName);
            $data['image'] = 'assets/backend/images/lookbooks/' . $imageName;
        }
        if ($request->hasFile('hover_image')) {
            $hoverImageName = time().'_hover_'.uniqid().'.'.$request->hover_image->extension();
            $request->hover_image->move(public_path('assets/backend/images/lookbooks'), $hoverImageName);
            $data['hover_image'] = 'assets/backend/images/lookbooks/' . $hoverImageName;
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
