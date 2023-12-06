@extends('layouts.user.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            @foreach($jobs as $job)
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class=" bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">{{$job->job_type}}</h6>
                        <a href="">Details</a>
                    </div>
                    <div class="d-flex align-items-center py-3" >
                        <img class="mb-3 rounded-circle flex-shrink-0" src="{{Storage::url($job->profile->profile_pic)}}" alt="" style="width: 125px; height: 125px;">
                        <div class=" ms-3">
                            <h3 class="mb-3 mt-2 w-100">{{$job->profile->name}}</h3>
                            <h5>{{$job->title}} </h5>
                            <p>Address: {{$job->address}}</p>
                            <div>
                                <span>Salary: € {{$job->salary}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <small>Deadline date: {{$job->application_close}}</small>
                        <a href="" class="btn btn-primary">Apply</a>
                    </div>
                </div>
            </div>
            @endforeach

                </div>
            </div>


@endsection
