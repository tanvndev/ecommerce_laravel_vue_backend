<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = JWTAuth::attempt($credentials)) {

            return response()->json([
                'code' => ResponseEnum::OK,
                'message' => 'Đăng nhập thành công.',
                'data' => $this->respondWithToken($token) // Phương thức respondWithToken phải được định nghĩa để trả về token
            ]);
        }

        return response()->json([
            'code' => ResponseEnum::BAD_REQUEST,
            'message' => 'Email hoặc mật khẩu không chính xác.',
            'data' => []
        ]);
    }
    public function me()
    {
        return response()->json(Auth::user());
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
