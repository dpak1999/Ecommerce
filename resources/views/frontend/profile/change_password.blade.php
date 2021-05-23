@extends('frontend.main-master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <br>
                    <img class="card-img-top" style="border-radius: 50%" height="100%" width="100%"
                        src="{{ !empty($user->profile_photo_path) ? url('upload/user_images/' . $user->profile_photo_path) : url('upload/no_image.jpg') }}"
                        alt="..."><br><br>
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-block btn-primary">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-sm btn-block btn-primary">Profile Update</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-block btn-danger">Logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            Change Password
                        </h3>
                        <div class="card-body" style="margin-top: 3rem">
                            <form action="{{ route('user.password.update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="email">Current Password</label>
                                    <input type="password" name="oldpassword" id="current_password" class="form-control"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="name">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <div class=" form-group">
                                    <label class="info-title" for="name">Confirm Password</label>
                                    <input type="text" name="password_confirmation" id="password_confirmation"
                                        class="form-control" required>
                                </div>

                                <div class=" form-group">
                                    <button type="submit" class="btn btn-danger">Update your profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
