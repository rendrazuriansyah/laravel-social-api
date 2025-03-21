<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validation = Validator::make($request->all(), [
            'post_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyukai post',
            ], 400);
        }

        $like = Like::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menyukai post',
            'data' => $like,
        ], 201);
    }

    public function destroy(int $id)
    {
        Like::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus like',
        ]);
    }
}
