@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products List</h3>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name English</th>
                                    <th>Product Name Hindi</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($item->product_thumbnail) }}"
                                                style="width: 60px; height: 50px;">
                                        </td>
                                        <td>{{ $item->product_name_en }}</td>
                                        <td>{{ $item->product_name_hin }}</td>
                                        <td>
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info"
                                                title="Edit Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('category.delete', $item->id) }}" class=" btn btn-danger"
                                                id="delete" title="Delete Data">
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
        </section>
    </div>

@endsection
