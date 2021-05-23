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
                        <a href="" class="btn btn-sm btn-block btn-primary">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-sm btn-block btn-danger">Logout</a>
                    </ul>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            Hi
                            <strong>{{ Auth::user()->name }}</strong>
                            Update your profile
                        </h3>
                        <div class="card-body" style="margin-top: 3rem">
                            <form action="{{ route('user.profile.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" required
                                        value="{{ $user->email }}" />
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="name">Name</label>
                                    <input type="text" name="name" class="form-control" required
                                        value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="name">Phone</label>
                                    <input type="text" name="phone" class="form-control" required
                                        value="{{ $user->phone }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="name">User Image</label>
                                    <input type="file" name="profile_photo_path" class="form-control" required>
                                </div>

                                <div class="form-group">
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
