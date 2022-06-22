<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $clipart = $request['clipart'] ?? "";
        if ($clipart != "")
            $posts = Post::where('post_title', 'LIKE', "%$clipart%")->orwhere('post_tags', 'LIKE', "%$clipart%")->paginate(5);
        else
            $posts = Post::paginate(5);
        return view('frontend.search', compact('posts', 'clipart'));
    }
}
