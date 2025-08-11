<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id = 1)
    {
        // Nếu chưa có bản ghi, tạo bản ghi mặc định
        $footer = Footer::first();
        if (!$footer) {
            $footer = Footer::create([
                'info_title' => 'Infomation',
                'about_text' => 'About Us',
                'about_link' => '#',
                'stories_text' => 'Our Stories',
                'stories_link' => '#',
                'size_guide_text' => 'Size Guide',
                'size_guide_link' => '#',
                'contact_text' => 'Contact us',
                'contact_link' => '#',
                'customer_service_title' => 'Customer Services',
                'shipping_text' => 'Shipping',
                'shipping_link' => '#',
                'return_text' => 'Return & Refund',
                'return_link' => '#',
                'privacy_text' => 'Privacy Policy',
                'privacy_link' => '#',
                'terms_text' => 'Terms & Conditions',
                'terms_link' => '#',
                'hotline' => '',
                'email' => '',
                'newsletter_title' => 'Stay in the loop with Weekly newsletters',
                'newsletter_placeholder' => 'Enter your e-mail',
                'newsletter_button' => 'Subscribe',
                'facebook' => '',
                'zalo' => '',
                'tiktok' => '',
                'youtube' => '',
                'instagram' => '',
                'copyright' => 'Copyright ©2025 Povico. All Rights Reserved.',
            ]);
        }
        return view('admin.footers.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $footer = Footer::findOrFail($id);
        $footer->update($request->all());
        return redirect()->back()->with('success', 'Cập nhật footer thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
