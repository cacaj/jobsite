@extends('layouts.admin.main')

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded mx-0">
            <div class="bg-secondary mt-3 mb-2 text-center"><h3>Applicants at {{$listing->title}}</h3></div>

        </div>
        <br>
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">
            @foreach($listing->users as $user)
    <div class="col-sm-12 col-md-6 col-xl-4 mt-2 mb-2">
        <div class="h-100 {{$user->pivot->shortlisted ? 'bg-dark' : 'bg-secondary'}} rounded p-1">
            <div class="d-flex align-items-center border-bottom py-3">
                @if($user->profile_pic)
                    <img class="rounded-circle flex-shrink-0" src="{{Storage::url($user->profile_pic)}}" alt="" style="width: 120px; height: 120px;">
                @else
                    <img class="rounded-circle flex-shrink-0" src="{{asset('img/user.png')}}" alt="" style="width: 120px; height: 120px;">
                @endif
                <div class="w-100 ms-3">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="{{$user->pivot->shortlisted ? 'text-primary' : ''}} mb-0">{{$user->name}}</h4>
                                                @if($user->resume)
                            <small><a href="{{Storage::url($user->resume)}}" class="btn btn-lg btn-lg-square btn-outline-primary" target="_blank"><i class="fa fa-download"></i></a></small>
                                                @else
                            <small>User has no resume</small>
                                                @endif
                        <form action="{{route('applicants.shortlist', [$listing->id,$user->id])}}" method="post"> @csrf
                            <small><button class="btn btn-lg btn-lg-square {{$user->pivot->shortlisted ? 'btn-primary' : 'btn-outline-primary'}} " type="submit"><i class="{{$user->pivot->shortlisted ? 'fa fa-user-check' : 'fa fa-list-ol'}}"></i></button></small>
                        </form>
                    </div>
                    <span class="{{$user->pivot->shortlisted ? 'text-primary' : ''}}">{{$user->email}}</span> <br>
                    <span class="{{$user->pivot->shortlisted ? 'text-primary' : ''}}">{{$user->pivot->created_at}}</span>
                </div>
            </div>
        </div>
    </div>
            @endforeach
            </div>
    </div>

{{--    tabela--}}

{{--    <div class="container-fluid pt-4 px-4">--}}
{{--        <div class="row bg-light rounded mx-0">--}}
{{--            <div class="bg-light mt-3 mb-2 text-center"><h3>{{$listing->title}}</h3></div>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0">--}}
{{--            <div class="col-md-6 mt-4 mb-3 text-center">--}}
{{--                @foreach($listing->users as $user)--}}
{{--                    <div class="card rc mt-4">--}}
{{--                        @if($user->profile_pic)--}}
{{--                            <img src="{{Storage::url($user->profile_pic)}}"  style="width:100%;height:100%">--}}
{{--                        @else--}}
{{--                            <img src="https://placehold.co/400" style="width:100%">--}}
{{--                        @endif--}}
{{--                        <br>--}}
{{--                        <h1>{{$user->name}}</h1>--}}
{{--                        <p class="title rc">{{$user->email}}</p>--}}
{{--                        <p>{{$user->pivot->created_at}}</p>--}}
{{--                        @if($user->resume)--}}
{{--                            <p><a href="{{Storage::url($user->resume)}}" class="btn btn-primary w-75 m-2" target="_blank">Download resume</a>--}}
{{--                        @else--}}
{{--                            <p>User has no resume</p>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
<style>
    .card.rc {
        background-color: #1a202c;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 400px;
        margin: auto;
        text-align: center;
    }

    .title.rc {
        color: grey;
        font-size: 18px;
    }

    button.rc {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 8px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
    }

    button.rc:hover, a:hover {
        opacity: 0.7;
    }
</style>
