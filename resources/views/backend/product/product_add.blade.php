@extends('admin.admin_master')
@section('admin')

    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Product</h4>
                </div>
                <div class="box-body">
                    <form novalidate>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Brand</h5>
                                    <div class="controls">
                                        <select name="brand_id" class="form-control">
                                            <option value="" disabled selected>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">
                                                    {{ $brand->brand_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Category Select</h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Select Subcategory</h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" disabled selected>Select Subcategory</option>
                                        </select>
                                        @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Sub-subcategory</h5>
                                    <div class="controls">
                                        <select name="subsubcategory_id" class="form-control">
                                            <option value="" disabled selected>Select Sub-subCategory</option>
                                        </select>
                                        @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product name (English)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_en" class="form-control">
                                        @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product name (Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_name_hin" class="form-control">
                                        @error('product_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product code</h5>
                                    <div class="controls">
                                        <input type="text" name="product_code" class="form-control">
                                        @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product qty</h5>
                                    <div class="controls">
                                        <input type="text" name="product_qty" class="form-control">
                                        @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product tags (English)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_en" class="form-control" data-role="tagsinput"
                                            value="lorem,ipsum,amer">
                                        @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product tags (Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_tags_hin" class="form-control"
                                            data-role="tagsinput" value="lorem,ipsum,amer">
                                        @error('product_tags_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product size (English)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_en" class="form-control" data-role="tagsinput"
                                            value="lorem,ipsum,amer">
                                        @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product size (Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_size_hin" class="form-control"
                                            data-role="tagsinput" value="lorem,ipsum,amer">
                                        @error('product_size_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product color (English)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_en" class="form-control"
                                            data-role="tagsinput" value="lorem,ipsum,amer">
                                        @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product color (Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="product_color_hin" class="form-control"
                                            data-role="tagsinput" value="lorem,ipsum,amer">
                                        @error('product_color_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product selling price</h5>
                                    <div class="controls">
                                        <input type="text" name="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product discount price</h5>
                                    <div class="controls">
                                        <input type="text" name="discount_price" class="form-control">
                                        @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Thumbnail</h5>
                                    <div class="controls">
                                        <input type="file" name="product_thumbnail" class="form-control">
                                        @error('product_thumbnail')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <h5>Product Images</h5>
                                    <div class="controls">
                                        <input type="file" name="multi_img[]" class="form-control">
                                        @error('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description (English)</h5>
                                    <div class="controls">
                                        <textarea name="short_desc_en" id="textarea" class="form-control"></textarea>
                                        @error('short_desc_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Short Description (Hindi)</h5>
                                    <div class="controls">
                                        <textarea name="short_desc_hin" id="textarea" class="form-control"></textarea>
                                        @error('short_desc_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Long Description (English)</h5>
                            <div class="controls">
                                <textarea name="long_desc_en" id="editor1" class="form-control"></textarea>
                                @error('long_desc_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <h5>Long Description (Hindi)</h5>
                            <div class="controls">
                                <textarea name="long_desc_hin" id="editor2" class="form-control"></textarea>
                                @error('long_desc_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input name="hot_deals" type="checkbox" id="checkbox_2" value="1">
                                            <label for="checkbox_2">Hot deals</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="featured" type="checkbox" id="checkbox_3" value="1">
                                            <label for="checkbox_3">Featured</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="controls">
                                        <fieldset>
                                            <input name="special_offer" type="checkbox" id="checkbox_4" value="1">
                                            <label for="checkbox_4">Special Offer</label>
                                        </fieldset>
                                        <fieldset>
                                            <input name="special_deals" type="checkbox" id="checkbox_5" value="1">
                                            <label for="checkbox_5">Special Deals</label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary my-5" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection
