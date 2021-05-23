@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Brand Name English</th>
                                            <th>Brand Name Hindi</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $item)
                                            <tr>
                                                <td>{{ $item->brand_name_en }}</td>
                                                <td>{{ $item->brand_name_hin }}</td>
                                                <td>
                                                    <img src="{{ asset($item->brand_image) }}"
                                                        style="width: 70px;height: 40px;" alt="...">
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-info">Edit</a>
                                                    <a href="" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- add brand --}}
                <div class="col-xs-12 col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Brand</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Brand Name(English)</h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Name(Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_hin" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Brand Image</h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control" required>
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
