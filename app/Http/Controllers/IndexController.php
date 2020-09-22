<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Http\Resources\PostResource;


class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', false)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $featured_posts = Post::where('is_published',true)
            ->where('is_featured',true)
            ->orderBy('id','desc')
            ->take(5)
            ->get();
        //$categories = Category::all();
        $tags = Tag::all();

        $recent_posts = Post::where('is_published',true)->orderBy('created_at','desc')->take(5)->get();

       return [
           'featured_posts' => PostResource::collection($featured_posts),
           'posts' => PostResource::collection($posts),
           'tags' => TagResource::collection($tags),
       ];
    }
}
