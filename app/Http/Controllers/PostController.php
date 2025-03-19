<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }
}
