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
            return response()->json(['success' => true, 'message' => 'Category added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Category already exists']);
        }
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        if ($category) {
            $category->delete();
            return response()->json(['success' => true, 'message' => 'Category deleted successfully']);
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
        }
        return response()->json($output);
    }
}
