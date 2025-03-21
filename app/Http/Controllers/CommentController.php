<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'content' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil membuat komentar baru',
            'data' => $comment,
        ], 201);
    }

    public function destroy(int $id)
    {
        Comment::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus komentar',
        ]);
    }
}
