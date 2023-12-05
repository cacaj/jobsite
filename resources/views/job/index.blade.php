@extends('layouts.admin.main')

@section('content')


    <div class="container-fluid pt-4 px-4">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
            <div class="row bg-secondary rounded mx-0">
                <div class="bg-secondary mt-3 mb-2 text-center"> <h3>Your Jobs</h3></div>
            </div>
            <br>
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 mt-4 mb-3 text-center">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Created on</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($jobs as $job)
                            <tr>
                                <th scope="col">{{$job->title}}</th>
                                <th scope="col">{{$job->created_at->format('Y-m-d')}}</th>
                                <th scope="col"><a href="{{route('job.edit',[$job->id])}}" class="btn btn-warning">Edit</a></th>
                                <th scope="col"><a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteJob{{$job->id}}">Delete</a></th>
                            </tr>

                            <div class="modal fade" id="deleteJob{{$job->id}}" tabindex="-1" aria-labelledby="Delete a Job" aria-hidden="true">
                                <form action="{{route('job.delete',[$job->id])}}" method="POST">@csrf
                                    @method('DELETE')
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete a Job</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>{{$job->title}}</h4>
                                                Are you sure you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit"  class="btn btn-primary">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
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
@endsection
