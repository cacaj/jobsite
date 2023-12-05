@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">

        <div class="row justify-content-center">
            <h3>Update your profile</h3>
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data"> @csrf
                        <div class="col-md-8 mt-3">
                            <div class="form-group mb-3">
                                @if(auth()->user()->profile_pic)
                                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" alt="Profile Picture" width="250" class="mb-3">
                                    <br>
                                @endif
                                <label for="profile_image">Profile image</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_pic">
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}"
                                       placeholder="Software Engineer">
                                <label for="title">Your name</label>
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-warning" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <h3>Change password</h3>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('user.password')}}" method="post"> @csrf
                        <div class="col-md-8">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="current_password"
                                       placeholder="Current password">
                                <label for="title">Current password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password"
                                       placeholder="New password">
                                <label for="title">New password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Confirm password">
                                <label for="title">Confirm password</label>
                                @if($errors->has('password'))
                                    <div class="error">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="form-group mt-4">
                                <button class="btn btn-warning" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <h3>Update your resume</h3>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <form action="{{route('upload.resume')}}" method="post" enctype="multipart/form-data"> @csrf
                        <div class="col-md-8 mt-3">
                            <div class="form-group mb-3">
                                <label for="profile_image">Resume</label>
                                <input type="file" class="form-control" id="resume" name="resume">
                                @if($errors->has('resume'))
                                    <div class="error">{{$errors->first('resume')}}</div>
                                @endif
                            <div class="form-group mt-4">
                                <button class="btn btn-warning" type="submit">Update</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
