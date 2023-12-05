@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        @if(Session::has('note'))
            <div class="alert alert-warning">{{Session::get('note')}}</div>
        @endif
        <div class="alert alert-light">Hello, {{ auth()->user()->name }}</div>
            @if(Session::has('successEmail'))
                <div class="alert alert-success">{{Session::get('successEmail')}}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
        @if(!auth()->user()->billing_ends)
        @if(Auth::check() && auth()->user()->user_type == 'admin')
        <p>Your trial {{now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired' : 'will expire' }} on {{auth()->user()->user_trial}}</p>
        @endif
        @endif
        @if(auth()->user()->billing_ends)
        @if(Auth::check() && auth()->user()->user_type == 'admin')
                    <div class="text-warning">Your membership {{now()->format('Y-m-d') > auth()->user()->billing_ends ? 'was expired' : 'will expire' }} on {{auth()->user()->billing_ends}}</div>
        @endif
        @endif

        <div class="row justify-content-center">



@endsection

