@extends('layouts.admin.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
            <div class="row bg-secondary rounded mx-0">
                <div class="bg-secondary mt-3 mb-2 text-center"><h3>Update a Job</h3></div>
            </div>
            <br>
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 mt-4 mb-3 text-center">
                <form action="{{route('job.update', $listing->id)}}" method="post" enctype="multipart/form-data">@csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="title" name="title" value="{{$listing->title}}"
                               placeholder="Software Engineer">
                        <label for="title">Title</label>
                        @if($errors->has('title'))
                            <div class="error">{{$errors->first('title')}}</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Description" id="description" name="description" style="height: 150px;"> {{$listing->description}}</textarea>
                        <label for="description">Description</label>
                        @if($errors->has('description'))
                            <div class="error">{{$errors->first('description')}}</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Roles and Responsibility" id="roles" name="roles" style="height: 150px;"> {{$listing->roles}}</textarea>
                        <label for="roles">Roles and Responsibility</label>
                        @if($errors->has('roles'))
                            <div class="error">{{$errors->first('roles')}}</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="job_type" name="job_type"
                                aria-label="Floating label select example" >
                            <option selected id="{{$listing->job_type}}">{{$listing->job_type}}</option>
                            {{--                                <option value="Full Time" id="full_time">Full time</option>--}}
                            {{--                                <option value="Part Time" id="part_time">Part time</option>--}}
                            {{--                                <option value="Casual" id="casual">Casual</option>--}}
                            {{--                                <option value="Contract" id="contract">Contract</option>--}}

                        </select>
                        @if($errors->has('job_type'))
                            <div class="error">{{$errors->first('job_type')}}</div>
                        @endif
                        <label for="job_type">Select job time</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address" name="address" value="{{$listing->address}}"
                               placeholder="Address">
                        <label for="title">Address</label>
                        @if($errors->has('address'))
                            <div class="error">{{$errors->first('address')}}</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" id="datepicker" name="date" class="form-control" value="{{$listing->application_close}}" placeholder="Application closing date">
                        <label for="datepicker">Application closing date</label>
                        @if($errors->has('date'))
                            <div class="error">{{$errors->first('date')}}</div>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="salary" name="salary" value="{{$listing->salary}}"
                               placeholder="Software Engineer">
                        <label for="title">Salary</label>
                        @if($errors->has('salary'))
                            <div class="error">{{$errors->first('salary')}}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="feature_image" class="form-label">Feature image</label>
                        <input class="form-control bg-dark" type="file" name="feature_image" id="feature_image">
                        @if($errors->has('feature_image'))
                            <div class="error">{{$errors->first('feature_image')}}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-warning w-100">Update</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .error{
            color: red;
            font-weight: bold;
            margin-left: 3px;
        }
    </style>
@endsection
