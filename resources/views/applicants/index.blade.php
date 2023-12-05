@extends('layouts.admin.main')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded mx-0">
            <div class="bg-secondary text-center mt-3 mb-1"><h3>Your Applicants</h3></div>
        </div>
        <br>
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 mt-4 mb-3 text-center">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Job</th>
                            <th scope="col">Applicants</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listings as $listing)
                            <tr>
                                <th scope="col">{{$listing->title}}</th>
                                <th scope="col">{{$listing->created_at->format('Y-m-d')}}</th>
                                <th scope="col">{{$listing->users_count}}</th>
                                <th scope="col">View</th>
                                <th scope="col"><a class="btn btn-info" href="{{route('applicants.show',$listing->slug)}}">View</a></th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
@endsection

