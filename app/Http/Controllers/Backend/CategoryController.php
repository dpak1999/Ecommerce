<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $category = Category::latest()->get();
        return view("backend.category.category_view", compact("category"));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            "category_name_en" => "required",
            "category_name_hin" => "required",
        ], [
            "category_name_en.required" => "This field is required",
            "category_name_hin.required" => "This field is required",
        ]);

        Category::insert([
            "category_name_en" => $request->category_name_en,
            "category_name_hin" => $request->category_name_hin,
            "category_slug_en" => strtolower(str_replace(" ", "-", $request->category_name_en)),
            "category_slug_hin" => str_replace(" ", "-", $request->category_name_hin),
        ]);

        $notification = array(
            "message" => "Category Added Successfully",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }
}
