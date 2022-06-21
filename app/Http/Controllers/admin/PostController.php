<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    public function posts()
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
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required',
            'post_tags' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required|image|mimes:png'
        ]);
        $post_title = $request->post_title;
        $post_category = $request->post_category;
        $image = getimagesize($request->image);

        $slug_url = generate_slug_url(Post::all(), $post_title . '-' . $post_category);
        $thumbnail = $post_title . '-' . time() . '.' . 'jpg';
        $png = $post_title . '-' . time() . '.' . $request->image->getClientOriginalExtension();

        /* ----------Create thumbnail---------------- */
        $imgtmp = $request->file('image')->getPathname();
        // $bgimage = Storage::url('images/background.png');
        $bgimage = storage_path('app/public/images/background.png');
        $nwidth = $image[0];
        $nheight = $image[1];
        $newimage = imagecreatetruecolor($nwidth, $nheight);
        $bgsource = imagecreatefrompng($bgimage);
        $imgsource = imagecreatefrompng($imgtmp);
        imagecopyresized($newimage, $bgsource, 0, 0, 0, 0, $nwidth, $nheight, 840, 859);
        imagecopy($newimage, $imgsource, 0, 0, 0, 0, $nwidth, $nheight);
        imagejpeg($newimage, storage_path('app/public/thumbnails /' . $thumbnail), 50);
        $pngPath = $request->file('image')->storeAs("public/png", $png);

        $search_keywords = $post_title . ',' . $post_category . ',' . $request->post_tags;

        $post = new Post;
        $post->post_title = $post_title;
        $post->post_category = $post_category;
        $post->post_tags = $request->post_tags;
        $post->post_content = $request->post_content;
        $post->post_slug = $slug_url;
        $post->search_keywords = $search_keywords;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->png_file_size = $request->image->getSize();
        $post->png_width = $image[0];
        $post->png_height = $image[1];
        $post->png_mime_type = $image['mime'];
        $post->png_file_path = $png;
        $post->post_author = 1;
        $post->thumbnail = $thumbnail;
        $post->save();

        if ($post) {
            session()->flash('post-add-success', 'Post created successfully');
            return redirect()->route('post.add');
        } else {
            session()->flash('post-add-error', 'Something went wrong');
            return redirect()->route('post.add');
        }
    }

    public function editPost($id)
    {
        $post = Post::find($id);
        return view('admin.edit-post', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required',
            'post_tags' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required|image|mimes:png'
        ]);
        $post_title = $request->post_title;
        $post_category = $request->post_category;
        $image = getimagesize($request->image);

        $slug_url = generate_slug_url(Post::all(), $post_title . '-' . $post_category);
        $thumbnail = $post_title . '-' . time() . '.' . 'jpg';
        $png = $post_title . '-' . time() . '.' . $request->image->getClientOriginalExtension();
        $search_keywords = $post_title . ',' . $post_category . ',' . $request->post_tags;

        $post = Post::find($id);
        $post->post_title = $post_title;
        $post->post_category = $post_category;
        $post->post_tags = $request->post_tags;
        $post->post_content = $request->post_content;
        $post->post_slug = $slug_url;
        $post->search_keywords = $search_keywords;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->meta_keywords = $request->meta_keywords;
        $post->png_file_size = $request->image->getSize();
        $post->png_width = $image[0];
        $post->png_height = $image[1];
        $post->png_mime_type = $image['mime'];
        $post->png_file_path = $png;
        $post->post_author = 1;
        $post->thumbnail = $thumbnail;
        $post->save();

        if ($post) {
            return redirect()->route('post.edit', $id)->with('success', 'Post updated successfully');
        } else {
            return redirect()->route('post.edit', $id)->with('error', 'Something went wrong');
        }
    }

    // public function deletePost(Request $request)
    // {
    //     $post = Post::find($request->id);
    //     if ($post) {
    //         $post->delete();
    //         return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Post not found']);
    //     }
    // }
    public function deletePost($id)
    {
        $post = Post::find($id);
        if (!is_null($post)) $post->delete();

        Storage::delete('public/thumbnails/' . $post->thumbnail);
        Storage::delete('public/png/' . $post->png_file_path);

        session()->flash('post-delete-success', 'Post deleted successfully');
        return redirect('/superadmin/post');
    }
}
