<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'comments', 'likes'])->get();

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        // dd($user); // jika di uncomment, maka akan error 500 karena
                    // dd() menghentikan proses dan tidak mengembalikan
                    // response apapun, sehingga tidak ada response yang
                    // dikirimkan ke client dan menyebabkan error 500

        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'image_url' => 'nullable',
        ]);

        // Jika validasi gagal, kirimkan pesan error
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        // Jika validasi berhasil, simpan data ke database
        $post = Post::create([
            'user_id' => $user->id,
            'content' => $request->content,
            'image_url' => $request->image_url,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil membuat post baru',
            'data' => $post,
        ], 201);
    }

    public function show($id)
    {
        $post = Post::find($id);

        return response()->json([
            'success' => true,
            'data' => $post,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string|max:255',
            'image_url' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
            ], 400);
        }

        $post = Post::find($id);

        // Tampung data baru
        $post->content = $request->content;
        $post->image_url = $request->image_url;

        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil memperbarui post',
            'data' => $post,
        ]);
    }

    public function destroy(int $id)
    {
        Post::destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus post',
        ]);
    }
}
