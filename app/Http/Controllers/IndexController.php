<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', false)->orderBy('id', 'desc')->get();

        $featured_posts = Post::where('is_published',true)->where('is_featured',true)->orderBy('id','desc')->take(5)->get();

        $categories = Category::all();

        $tags = Tag::all();

        return view('home', array(
            'posts' => $posts,
            'featured_posts' => $featured_posts,
            'categories' => $categories,
            'tags' => $tags,
        ));
    }
}
