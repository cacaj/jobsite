@extends('layouts.user.main')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 mt-5 justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                @include('messages')
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="#" class="">
                            <h3 class="text-primary"><i class="fa fa-user-shield me-2"></i>User</h3>
                        </a>
                        <h3>Register</h3>
                    </div>
                    <form action="{{route('store.user')}}" method="post">@csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Rinas">
                            <label for="name">Username</label>
                            @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com">
                            <label for="email">Email address</label>
                            @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                            <label for="password">Password</label>
                            @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
{{--                        <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                            <div class="form-check">--}}
{{--                                <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--                                <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--                            </div>--}}
{{--                            <a href="">Forgot Password</a>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Register</button>
                        <p class="text-center mb-0">Already have an Account? <a href="{{route('login')}}">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
