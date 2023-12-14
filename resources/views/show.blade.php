@extends('layouts.user.main')

@section('content')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <img src="{{Storage::url($listing->feature_image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <div class="card-header mb-5 align-items-center">
                            <a href="{{route('company',[$listing->profile->id])}}">
                                <img src="{{Storage::url($listing->profile->profile_pic)}}" width="60" height="60" class="rounded-circle" alt="">
                            </a>
                            <b>{{$listing->profile->name}}</b>
                        </div>

                        @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        <h1 class="card-title mt-3">{{$listing->title}}</h1>
                        <span class="badge bg-primary mb-4">{{$listing->job_type}}</span>
                        <p class="text-white">{{$listing->address}}</p>
                        <p class="text-white">€{{number_format($listing->salary,2)}}</p>
                        <h4 class="mt-4">Description</h4>
                        <p class="card-text">{{$listing->description}}</p>
                        <h4>Roles and responsibility</h4>
                        {{$listing->roles}}

                        <p class="card-text mt-4 text-warning">Application closing date: {{$listing->application_close}}</p>
                        @if(Auth::check())
                            @if(auth()->user()->resume)
                            <form action="{{route('application.submit',[$listing->id])}}" method="POST">@csrf
                        <button type="submit" class="btn btn-primary">Apply now</button>
                            </form>
                        @else
                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadResume">Apply now</button>
                        @endif
                            @else
                                <a href="{{route('login')}}">Please login to apply</a>
                            @endif
                        <div class="modal fade" id="uploadResume" tabindex="-1" aria-labelledby="Upload Resume" aria-hidden="true">
                            <form action="{{route('application.submit',[$listing->id])}}" method="POST">@csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Upload a resume</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="btnApply" disabled class="btn btn-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .modal-body{
            background-color: #1a202c;
        }
        .modal-content{
            background-color: #1a202c;
        }
        .modal-title {
            color: whitesmoke;
        }
    </style>
    {{--Filepond--}}
    <script src="{{asset('js/filepond.js')}}"></script>
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        pond.setOptions({
            server: {
                url: '/resume/upload',
                process: {
                    method: 'POST',
                    withCredentials: false,
                    headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'},
                    onload: (response) => {
                        document.getElementById('btnApply').removeAttribute('disabled')
                    },
                    onerror: (response) => {
                        console.log('error while uploading...', response)
                    },
                    ondata:(formData) => {
                        formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                        return formData
                    },
                },
            },
        });
    </script>
    <style>
        .card {
            background-color: #1a202c;
        }
    </style>
@endsection
