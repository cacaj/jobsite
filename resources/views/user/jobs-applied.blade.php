@extends('layouts.user.main')

@section('content')
    <div class="container mt-5">

<div class="row mt-5 justify-content-center">
    <div class="col-md-8">
        <h3>Your applications</h3>
        @foreach($users as $user)
            @foreach($user->listings as $listing)
            <div class="card mt-5 mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-5">{{$listing->title}}</h5>
                    <p class="card-text">Applied at: {{$listing->pivot->created_at}} </p>
                    <a href="{{route('job.show',[$listing->slug])}}" class="btn btn-primary">View</a>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>
</div>
    </div>
    <style>
        .card-body{
            background-color: #1a202c;
        }
        .card{
            background-color: #1a202c;
        }
    </style>
@endsection
