<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = ProductAttribute::with('group')->paginate(15);
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = ProductAttributeGroup::all();
        return view('admin.attributes.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:product_attributes,slug',
            'description' => 'nullable',
            'group_id' => 'required|exists:product_attribute_groups,id',
            'color' => 'nullable|string|max:20',
        ]);
        ProductAttribute::create($data);
        return redirect()->route('admin.attributes.index')->with('success', 'Thêm phân loại thành công');
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
        $attribute = ProductAttribute::findOrFail($id);
        $groups = ProductAttributeGroup::all();
        return view('admin.attributes.edit', compact('attribute', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $attribute = ProductAttribute::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'nullable',
            'description' => 'nullable',
            'group_id' => 'required|exists:product_attribute_groups,id',
            'color' => 'nullable|string|max:20',
        ]);
        $attribute->update($data);
        return redirect()->route('admin.attributes.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $attribute = ProductAttribute::findOrFail($id);
        $attribute->delete();
        return redirect()->route('admin.attributes.index')->with('success', 'Xóa phân loại thành công');
    }

    /**
     * Display a listing of the resource by group.
     */
    public function byGroup($groupId)
    {
        return \App\Models\ProductAttribute::where('group_id', $groupId)->get(['id', 'name']);
    }
}
