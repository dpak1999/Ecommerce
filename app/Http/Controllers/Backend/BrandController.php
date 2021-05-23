<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view("backend.brand.brand_view", compact("brands"));
    }

    public function brandStore(Request $request)
    {
        $request->validate([
            "brand_name_en" => "required",
            "brand_name_hin" => "required",
            "brand_image" => "required",
        ], [
            "brand_name_en.required" => "This field is required",
            "brand_name_hin.required" => "This field is required",
            "brand_image.required" => "This field is required",
        ]);

        $image = $request->file("brand_image");
        $name_gen = hexdec(uniqid()) . "." . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save("upload/brand/" . $name_gen);
        $save_url = "upload/brand/" . $name_gen;

        Brand::insert([
            "brand_name_en" => $request->brand_name_en,
            "brand_name_hin" => $request->brand_name_hin,
            "brand_slug_en" => strtolower(str_replace(" ", "-", $request->brand_name_en)),
            "brand_slug_hin" => str_replace(" ", "-", $request->brand_name_hin),
            "brand_image" => $save_url,
        ]);

        $notification = array(
            "message" => "Brand Added Successfully",
            "alert-type" => "success",
        );
        return redirect()->back()->with($notification);
    }
}
