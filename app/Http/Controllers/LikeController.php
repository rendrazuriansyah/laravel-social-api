<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'user_id' => 'required',
            'post_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyukai post',
            ], 400);
        }

        $like = Like::create([
            'user_id' => $request->user_id,
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
