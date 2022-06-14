<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts');
    }

    public function addPost()
    {
        return view('admin.add-post');
    }

    public function createPost(Request $request)
    {
        echo "<pre>";
        // print_r($request->all());

        $category = Category::where('cat_name', '=', "Festival")->get();

        if (count($category) > 0) {

            print_r($category->toArray());
            echo ($category->toArray()[0]['cat_id']);
            $cat_id = $category->toArray()[0]['cat_id'];
        } else {
            Category::create();
            
        }

        // $post = new Post;
        // $post->post_title = $request['post_title'];
        // $post->cat_id = $request['post_title'];
        // $post->category = $request['category'];
        // $post->post_title = $request['post_title'];
    }
}
