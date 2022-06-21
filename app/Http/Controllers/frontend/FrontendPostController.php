<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug_url', '=', "$slug")->get();

        if (count($post) > 0) {
            $post = $post[0];
            $cat_id = $post->cat_id;
            if ($cat_id != 0)
                $posts = Post::where('cat_id', '=', "$cat_id")->paginate(15);
            else
                $posts = [];
            return view('frontend.post', compact('post', 'posts'));
        } else
            return redirect('/');
    }
}
