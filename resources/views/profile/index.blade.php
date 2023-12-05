@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        <h3>Update your profile</h3>
        <div class="row justify-content-center">
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
                        <img class="rounded" src="{{Storage::url(auth()->user()->profile_pic)}}" alt="" style="width: 390px">
                        <br>
                    @else
                        <img class="rounded" src="{{asset('img/user.png')}}" alt="" style="width: 390px">
                        <br>
                    @endif
                    @if(auth()->user()->user_type == 'user')
                    <label for="logo">Profile picture</label>
                        @else
                            <label for="logo">Company logo</label>
                        @endif
                    <input type="file" class="form-control bg-dark" id="logo" name="profile_pic">
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}"
                           placeholder="Software Engineer">
                    <label for="title">Company name</label>
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-warning w-100" type="submit">Update</button>
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
                            </div>
                            @if($errors->has('password'))
                                <div class="text-danger">{{$errors->first('password')}}</div>
                            @endif
                            <div class="form-group mt-4">
                                <button class="btn btn-warning w-100" type="submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
