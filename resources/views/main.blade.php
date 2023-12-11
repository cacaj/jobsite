@extends('layouts.user.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
    <div class="d-lg-flex d-sm-flex justify-content-between">
        <h4>Recommended Jobs</h4>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Salary
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['sort' => 'salary_high_to_low'])}}">High  to low</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['sort' => 'salary_low_to_high'])}}">Low to high</a></li>

            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Date
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'latest'])}}">Latest</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['date' => 'oldest'])}}">Oldest</a></li>
            </ul>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Job
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'full_time'])}}">Full time</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'part_time'])}}">Part time</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'casual'])}}">Casual</a></li>
                <li><a class="dropdown-item" href="{{route('listing.index', ['job_type' => 'contract'])}}">Contract</a></li>

            </ul>
        </div>
    </div>

    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            @foreach($jobs as $job)
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="badge bg-primary mb-4">{{$job->job_type}}</span>
                    </div>
                    <div class="d-flex align-items-center py-3" >
                        <img class="mb-3 rounded-circle flex-shrink-0" src="{{Storage::url($job->profile->profile_pic)}}" alt="" style="width: 125px; height: 125px;">
                        <div class=" ms-3">
                            <h3 class="mb-3 mt-2 w-100">{{$job->profile->name}}</h3>
                            <h5>{{$job->title}} </h5>
                            <p>Address: {{$job->address}}</p>
                            <div>
                                <span>Salary: €{{number_format($job->salary,2)}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <small class="text-white" >Deadline date: {{$job->application_close}}</small>
                        <a href="{{route('job.show', [$job->slug])}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
            @endforeach

                </div>
            </div>


@endsection
