<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $category = Category::where('cat_name', '=', $request->category)->first();
        if (!$category) {
            $category = new Category();
            $category->cat_name = $request->category;
            $category->save();
        }
        echo 1;
    }

    public function deleteCategory($id)
    {
        // $category = Category::find($request->id);
        // if ($category) {
        //     $category->delete();
        //     return response()->json(['success' => true, 'message' => 'Category deleted successfully'],200);
        // } else {
        //     return response()->json(['success' => false, 'message' => 'Category not found'],200);
        // }
        $category = Category::find($id);
        if (!is_null($category)) $category->delete();

        session()->flash('success', 'Category deleted successfully');
        return redirect('/superadmin/category');
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            if ($request->status == 1) {
                $category->cat_status = 0;
            } else {
                $category->cat_status = 1;
            }
            $category->save();
            return response()->json(['success' => true, 'message' => 'Category updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Category not found']);
        }
    }

    public function categoryList(Request $request)
    {
        $categories = Category::where('cat_name', 'LIKE', '%' . $request->search . '%')->get();

        $output = '';
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                $output .= '<span class="CategoryItem" data-catid="">' . $category->cat_name . '</span>';
            }
        } else {
            $output = 0;
        }
        return response( $output, 200)->header('Content-Type', 'text/html');
    }
}
