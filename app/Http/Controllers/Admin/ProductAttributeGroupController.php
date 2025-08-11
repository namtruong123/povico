<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductAttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = ProductAttributeGroup::all();
        return view('admin.attribute_groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attribute_groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'nullable|unique:product_attribute_groups,slug',
            'description' => 'nullable'
        ]);
        $slug = $request->slug ?: Str::slug($request->name);
        ProductAttributeGroup::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description
        ]);
        return redirect()->route('admin.attribute_groups.index')->with('success', 'Thêm nhóm phân loại thành công');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
