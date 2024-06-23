<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(AuthRequest $request)
    {
        return response()->json([
            'code' => 200,
            'message' => 'Login successfully!',
            'data' => []
        ]);

        // Cai nay dung de kiem tra thong tin dang nhap voi database
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($credentials)) {
        //     return redirect()->route('dashboard.index')->with('toast_success', 'Đăng nhập thành công.');
        // }
        // return redirect()->back()->with('toast_error', 'Email hoặc mật khẩu không chính xác.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('auth.admin'));
    }
}
