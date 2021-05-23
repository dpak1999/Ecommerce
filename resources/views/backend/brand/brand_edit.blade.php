@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('brand.update', $brand->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">

                                <div class="form-group">
                                    <h5>Brand Name(English)</h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" class="form-control"
                                            value="{{ $brand->brand_name_en }}">
                                        @error('brand_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Name(Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_hin" class="form-control"
                                            value="{{ $brand->brand_name_hin }}">
                                        @error('brand_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Image</h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control">
                                        @error('brand_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary my-5" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
