<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function show(Request $request)
    {
        $post = Post::where('id', $request->id)->get();
        return PostResource::collection($post);

    }
}
