<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
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
            'user_id' => $request->user_id,
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
