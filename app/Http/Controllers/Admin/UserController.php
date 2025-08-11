<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('UserController@store - Request data:', $request->all());

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required|in:admin,user,giamdoc,sale_cuahang,sale_online,marketing',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/backend/images/avatar'), $fileName); // ✅ đường dẫn chuẩn
            $avatarPath = 'assets/backend/images/avatar/' . $fileName;
        }

        try {
            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'avatar'=>$avatarPath,
                'active'=>$request->has('active') ? 1 : 0
            ]);
            Log::info('User created:', ['id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('User create failed:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Không thể tạo tài khoản: '.$e->getMessage()])->withInput();
        }

        return redirect()->route('admin.users.index')->with('success','Tạo tài khoản thành công');
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
    public function edit(User $user)
    {
        $auth = Auth::user();
        // Chỉ admin mới được sửa thông tin người khác
        if ($auth->role !== 'admin' && $auth->id !== $user->id) {
            abort(403, 'Bạn không có quyền chỉnh sửa thông tin người này.');
        }
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $auth = Auth::user();
        if ($auth->role !== 'admin' && $auth->id !== $user->id) {
            abort(403, 'Bạn không có quyền chỉnh sửa thông tin người này.');
        }

        Log::info('UserController@update - Request data:', $request->all());

        $request->validate([
            'name' => 'required',
            'role' => 'required|in:admin,user,giamdoc,sale_cuahang,sale_online,marketing',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = [
            'name' => $request->name,
            'role' => $request->role,
            'active' => $request->has('active') ? 1 : 0
        ];

        if ($request->hasFile('avatar')) {
            try {
                if ($user->avatar && file_exists(public_path($user->avatar))) {
                    unlink(public_path($user->avatar));
                    Log::info('Old avatar deleted:', ['path' => $user->avatar]);
                }

                $file = $request->file('avatar');
                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/backend/images/avatar'), $fileName); // ✅ đúng thư mục

                $data['avatar'] = 'assets/backend/images/avatar/' . $fileName;
                Log::info('New avatar uploaded:', ['path' => $data['avatar']]);
            } catch (\Exception $e) {
                Log::error('Avatar upload/update failed:', ['error' => $e->getMessage()]);
            }
        }

        try {
            $user->update($data);
            Log::info('User updated:', ['id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('User update failed:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Không thể cập nhật tài khoản: ' . $e->getMessage()])->withInput();
        }

        return redirect()->route('admin.users.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
                Log::info('Avatar deleted on user destroy:', ['path' => $user->avatar]);
            }
            $user->delete();
            Log::info('User deleted:', ['id' => $user->id]);
        } catch (\Exception $e) {
            Log::error('User delete failed:', ['error' => $e->getMessage()]);
            return back()->withErrors(['error' => 'Không thể xóa tài khoản: '.$e->getMessage()]);
        }
        return redirect()->route('admin.users.index')->with('success','Xóa thành công');
    }
}
