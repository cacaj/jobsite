@extends('layouts.user.main')

@section('content')

    <div class="container">
        <div class="row mt-2">
            <div class="col">
                <div class="hero-section" style="background-color:#f5f5f5;width:100%;height:400px;">
                    <img src="{{Storage::url($company->profile_pic)}}" style="width: 100%; height:400px;">
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center" style="background-color: #1a202c">
            <div class="col-sm-6 col-md-4 col-xl-2 mt-2">
                <div class="ms-3">
                    <img src="{{Storage::url($company->profile_pic)}}" width="120" height="120" class="rounded-circle" alt="Company Logo" >
                    <h3 class="mb-3 mt-2 w-100">{{$company->name}}</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <h3>List of Jobs</h3>
                @foreach($company->jobs as $job)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title mb-5">{{$job->title}}</h5>
                            <p class="card-text">Location:{{$job->address}} </p>
                            <p class="card-text">Salary: €{{number_format($job->salary,2)}} per month</p>
                            <a href="{{route('job.show',[$job->slug])}}" class="btn btn-primary">View</a>
                        </div>
                    </div>
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
