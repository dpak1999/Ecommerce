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

    public function getSubCategory($category_id)
    {
        $subcategory = SubCategory::where("category_id", $category_id)->orderBy("subcategory_name_en", "ASC")->get();
        return json_encode($subcategory);
    }

    public function subsubcategoryStore(Request $request)
    {
        $request->validate([
            "category_id" => "required",
            "subcategory_id" => "required",
            "subsubcategory_name_en" => "required",
            "subsubcategory_name_hin" => "required",
        ], [
            "category_id.required" => "Please select a Category",
            "subcategory_id.required" => "Please select a Sub Category",
            "subsubcategory_name_en.required" => "This field is required",
            "subsubcategory_name_hin.required" => "This field is required",
        ]);

        SubSubCategory::insert([
            "category_id" => $request->category_id,
            "subcategory_id" => $request->subcategory_id,
            "subsubcategory_name_en" => $request->subsubcategory_name_en,
            "subsubcategory_name_hin" => $request->subsubcategory_name_hin,
            "subsubcategory_slug_en" => strtolower(str_replace(" ", "-", $request->subsubcategory_name_en)),
            "subsubcategory_slug_hin" => str_replace(" ", "-", $request->subsubcategory_name_hin),
        ]);

        $notification = array(
            "message" => "Sub-subcategory Added Successfully",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }

    public function subsubcategoryEdit($id)
    {
        $categories = Category::orderBy("category_name_en", "ASC")->get();
        $subcategories = SubCategory::orderBy("subcategory_name_en", "ASC")->get();
        $subsubcategories = SubSubCategory::findorFail($id);
        return view("backend.category.sub_subcategory_edit", compact("subcategories", "categories", "subsubcategories"));
    }

    public function subsubcategoryUpdate(Request $request)
    {
        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            "category_id" => $request->category_id,
            "subcategory_id" => $request->subcategory_id,
            "subsubcategory_name_en" => $request->subsubcategory_name_en,
            "subsubcategory_name_hin" => $request->subsubcategory_name_hin,
            "subsubcategory_slug_en" => strtolower(str_replace(" ", "-", $request->subsubcategory_name_en)),
            "subsubcategory_slug_hin" => str_replace(" ", "-", $request->subsubcategory_name_hin),
        ]);

        $notification = array(
            "message" => "Subcategory Updated Successfully",
            "alert-type" => "info",
        );
        return redirect()->route("all.subsubcategory")->with($notification);
    }

    public function subsubcategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            "message" => "Sub-subcategory Deleted Successfully",
            "alert-type" => "error",
        );

        return redirect()->back()->with($notification);
    }
}
