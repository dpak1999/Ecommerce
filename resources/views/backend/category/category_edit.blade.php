@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                {{-- add brand --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('category.update', $category->id) }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <div class="form-group">
                                    <h5>Category Name(English)</h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" class="form-control"
                                            value="{{ $category->category_name_en }}">
                                        @error('category_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Category Name(Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_hin" class="form-control"
                                            value="{{ $category->category_name_hin }}">
                                        @error('category_name_hin')
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
