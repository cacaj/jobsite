@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            Hello there!
        </div>
    </div>
@endsection
