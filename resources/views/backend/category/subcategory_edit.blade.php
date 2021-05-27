@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="row">
                {{-- add brand --}}
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Subcategory</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{ route('subcategory.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                <div class="form-group">
                                    <h5>Category Select</h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                                    {{ $category->category_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Subcategory Name(English)</h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_en" class="form-control"
                                            value="{{ $subcategory->subcategory_name_en }}">
                                        @error('subcategory_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Subcategory Name(Hindi)</h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_hin" class="form-control"
                                            value="{{ $subcategory->subcategory_name_hin }}">
                                        @error('subcategory_name_hin')
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
