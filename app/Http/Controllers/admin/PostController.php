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
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function addPost()
    {
        return view('admin.add-post');
    }

    public function createPost(Request $request)
    {
        echo "<pre>";
        // print_r($request->all());

        $post = new Post;
        $post->post_title = $request->post_title;
        $post->post_content = $request->post_content;
        $post->post_status = $request->post_status;
        $post->post_author = $request->post_author;
        $post->post_date = $request->post_date;
        $post->thumbnail = $request->thumbnail;
        $post->post_category = $request->post_category;
        $post->save();

    }

    public function deletePost(Request $request)
    {
        $post = Post::find($request->id);
        if ($post) {
            $post->delete();
            return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Post not found']);
        }
    }
}
