@extends('layouts.user.main')
@section('content')
            <div class="container-fluid">
                <div class="row h-100 mt-5 justify-content-center" style="min-height: 100vh;">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        @include('messages')
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="{{route('home')}}" class="">
                                    <h3 class="text-primary"><i class="fa fa-user-shield me-2"></i>CacajSite</h3>
                                </a>
                                <h3>Sign In</h3>
                            </div>
                            <form action="{{route('login.post')}}" method="post">@csrf
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="name@example.com">
                                <label for="email">Email address</label>
                                @if($errors->has('email'))
                                    <span class="text-danger">Please enter your email address</span>
                                @endif
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                                <label for="password">Password</label>
                                @if($errors->has('password'))
                                    <span class="text-danger">Please enter your password</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <a href="">Forgot Password</a>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                            <p class="text-center mb-0">Don't have an Account? <a href="{{route('create.user')}}">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="col-md-8">--}}

{{--                <div class="card shadow-lg">--}}
{{--                    <div class="card-header">Login</div>--}}
{{--                    <form action="{{route('login.post')}}" method="post">@csrf--}}
{{--                        @csrf--}}
{{--                        <div class="card-body">--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="">Email</label>--}}
{{--                                <input type="email" name="email" class="form-control" value="{{old('email')}}">--}}
{{--                                @if($errors->has('email'))--}}
{{--                                    <span class="text-danger">Please enter your email address</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="">Password</label>--}}
{{--                                <input type="password" name="password" class="form-control" alue="{{old('password')}}">--}}
{{--                                @if($errors->has('password'))--}}
{{--                                    <span class="text-danger">Please enter your password</span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                            <div class="form-group text-center">--}}
{{--                                <button class="btn btn-primary" type="submit">Login</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
