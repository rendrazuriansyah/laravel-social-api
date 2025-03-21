<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; // Validasi request
use Tymon\JWTAuth\Facades\JWTAuth; // Library JWTAuth
use Tymon\JWTAuth\Exceptions\JWTException; // Exception jika ada error di JWTAuth

class JWTAuthController extends Controller
{
    // Handing register.
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        // Jika validasi berhasil, simpan data ke database
        $user = User::create([
            // pake $request->get('')
            // karena jika kita tidak menggunakan $request->get(''), maka akan mengembalikan nilai null
            // dan jika kita tidak menggunakan $request->get(''), maka kita tidak dapat mengakses nilai dari inputan di form
            // dengan cara ini, kita dapat mengakses nilai dari inputan di form dengan lebih mudah dan aman
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // Generate token
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }
}
