@extends('admin.admin_master')
@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Edit profile</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Username</h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $editData->name }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Email</h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $editData->email }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Image</h5>
                                            <div class="controls">
                                                <input id="image" type="file" name="profile_photo_path" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <img id="showImage" class="rounded-circle w-100 h-100"
                                            src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images' . $editData->profile_photo_path) : url('upload/no_image.jpg') }}"
                                            alt="User Avatar">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#image").change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $("#showImage").attr("src", e.target.result)
                }
                reader.readAsDataURL(e.target.files["0"])
            })
        })

    </script>
@endsection
