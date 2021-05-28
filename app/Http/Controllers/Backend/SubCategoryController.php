<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryView()
    {
        $categories = Category::orderBy("category_name_en", "ASC")->get();
        $subcategory = SubCategory::latest()->get();
        return view("backend.category.subcategory_view", compact("subcategory", "categories"));
    }

    public function subcategoryStore(Request $request)
    {
        $request->validate([
            "category_id" => "required",
            "subcategory_name_en" => "required",
            "subcategory_name_hin" => "required",
        ], [
            "category_id.required" => "Please select an option",
            "subcategory_name_en.required" => "This field is required",
            "subcategory_name_hin.required" => "This field is required",
        ]);

        SubCategory::insert([
            "category_id" => $request->category_id,
            "subcategory_name_en" => $request->subcategory_name_en,
            "subcategory_name_hin" => $request->subcategory_name_hin,
            "subcategory_slug_en" => strtolower(str_replace(" ", "-", $request->subcategory_name_en)),
            "subcategory_slug_hin" => str_replace(" ", "-", $request->subcategory_name_hin),
        ]);

        $notification = array(
            "message" => "Subcategory Added Successfully",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function subcategoryEdit($id)
    {
        $categories = Category::orderBy("category_name_en", "ASC")->get();
        $subcategory = SubCategory::findorFail($id);
        return view("backend.category.subcategory_edit", compact("subcategory", "categories"));
    }

    public function subcategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            "category_id" => $request->category_id,
            "subcategory_name_en" => $request->subcategory_name_en,
            "subcategory_name_hin" => $request->subcategory_name_hin,
            "subcategory_slug_en" => strtolower(str_replace(" ", "-", $request->subcategory_name_en)),
            "subcategory_slug_hin" => str_replace(" ", "-", $request->subcategory_name_hin),
        ]);

        $notification = array(
            "message" => "Subcategory Updated Successfully",
            "alert-type" => "info",
        );
        return redirect()->route("all.subcategory")->with($notification);
    }

    public function subcategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            "message" => "SubCategory Deleted Successfully",
            "alert-type" => "error",
        );

        return redirect()->back()->with($notification);
    }

    // -------------------Sub Subcategory---------------------

    public function subsubcategoryView()
    {
        $categories = Category::orderBy("category_name_en", "ASC")->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view("backend.category.sub_subcategory_view", compact("subsubcategory", "categories"));
    }
}
