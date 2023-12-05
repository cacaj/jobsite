@extends('layouts.user.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fa fa-exclamation-circle me-2"></i>Your account is not verified. Please verify your account first! <a href="{{route('resend.email')}}">Resend verification email.</a>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endsection
