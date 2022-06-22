<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('post_slug', '=', "$slug")->get();

        if (count($post) > 0) {
            $post = $post[0];
            $category = $post->category;
            $posts = Post::where('search_keywords', '=', "$category")->paginate(15);
            return view('frontend.post', compact('post', 'posts'));
        } else
            return redirect('/');
    }
}
