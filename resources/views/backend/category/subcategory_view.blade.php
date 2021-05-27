@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Subcategory List</h3>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Sub Category Name English</th>
                                            <th>Sub Category Name Hindi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $item)
                                            <tr>
                                                <td>{{ $item->category_id }}</td>
                                                <td>{{ $item->subcategory_name_en }}</td>
                                                <td>{{ $item->subcategory_name_hin }}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info"
                                                        title="Edit Data">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('category.delete', $item->id) }}"
                                                        class=" btn btn-danger" id="delete" title="Delete Data">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
                            <h3 class="box-title">Add Subcategory</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('category.store') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Category Select</h5>
                                    <div class="controls">
                                        <select name="select" id="select" required class="form-control">
                                            <option value="">Select Your City</option>
                                            <option value="1">India</option>
                                            <option value="2">USA</option>
                                            <option value="3">UK</option>
                                            <option value="4">Canada</option>
                                            <option value="5">Dubai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Subcategory Name(English)</h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Subcategory Name(Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_hin" class="form-control">
                                        @error('category_name_hin')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary my-5" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
