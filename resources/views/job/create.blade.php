@extends('layouts.admin.main')

@section('content')

    <div class="container-fluid pt-4 px-4">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
            <div class="row bg-secondary rounded mx-0">
                <div class="bg-secondary mt-3 mb-2 text-center"><h3>Post a Job</h3></div>
            </div>
            <br>
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 mb-3 mt-4 text-center">
                    <form action="{{route('job.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}"
                                   placeholder="Software Engineer">
                            <label for="title">Title</label>
                            @if($errors->has('title'))
                                <div class="error">{{$errors->first('title')}}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Description" id="description" name="description"  style="height: 150px;"></textarea>
                            <label for="description">Description</label>
                            @if($errors->has('description'))
                                <div class="error">{{$errors->first('description')}}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Roles and Responsibility" id="roles" name="roles"  style="height: 150px;"></textarea>
                            <label for="roles">Roles and Responsibility</label>
                            @if($errors->has('roles'))
                                <div class="error">{{$errors->first('roles')}}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="job_type" name="job_type"
                                    aria-label="Floating label select example">
                                <option selected id="full_time">Full time</option>
                                <option value="Part Time" id="part_time">Part time</option>
                                <option value="Casual" id="casual">Casual</option>
                                <option value="Contract" id="contract">Contract</option>
                            </select>
                            @if($errors->has('job_type'))
                                <div class="error">{{$errors->first('job_type')}}</div>
                            @endif
                            <label for="job_type">Select job time</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}"
                                   placeholder="Address">
                            <label for="title">Address</label>
                            @if($errors->has('address'))
                                <div class="error">{{$errors->first('address')}}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" id="datepicker" name="date" value="{{old('date')}}" class="form-control" placeholder="Application closing date">
                            <label for="datepicker">Application closing date</label>
                            @if($errors->has('date'))
                                <div class="error">{{$errors->first('date')}}</div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="salary" name="salary" value="{{old('salary')}}"
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
                        <button type="submit" class="btn btn-success w-100"><i class="fa fa-chevron-circle-up me-2"></i>Post your job</button>
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
