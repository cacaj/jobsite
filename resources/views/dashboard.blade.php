@extends('layouts.admin.main')

@section('content')
    <div class="container mt-5">
        @if(Session::has('note'))
            <div class="alert alert-warning">{{Session::get('note')}}</div>
        @endif
        <div class="alert alert-light">Hello, {{ auth()->user()->name }}</div>
            @if(Session::has('successEmail'))
                <div class="alert alert-success">{{Session::get('successEmail')}}</div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
        @if(!auth()->user()->billing_ends)
        @if(Auth::check() && auth()->user()->user_type == 'admin')
        <p>Your trial {{now()->format('Y-m-d') > auth()->user()->user_trial ? 'was expired' : 'will expire' }} on {{auth()->user()->user_trial}}</p>
        @endif
        @endif
        @if(auth()->user()->billing_ends)
        @if(Auth::check() && auth()->user()->user_type == 'admin')
                    <div class="text-warning">Your membership {{now()->format('Y-m-d') > auth()->user()->billing_ends ? 'was expired' : 'will expire' }} on {{auth()->user()->billing_ends}}</div>
        @endif
        @endif

            <div class="container-fluid pt-4 px-4">
                <div class="row rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 mt-4 mb-3 text-center">
                       <div class="row">
                           <div class="col-xl-3 col-md-6">
                               <div class="card bg-success text-white mb-4">
                                   <div class="card-body">Total jobs: {{\App\Models\Listing::where('user_id', auth()->user()->id)->count()}}</div>
                                   <div class="card-footer d-flex align-items-center justify-content-between">
                                       <a href="/job" class="small text-white stretched-link">View details</a>
                                       <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                   </div>
                               </div>
                               <div class="card bg-info text-white mb-4">
                                   <div class="card-body">Your profile</div>
                                   <div class="card-footer d-flex align-items-center justify-content-between">
                                       <a href="/user/profile" class="small text-white stretched-link">View details</a>
                                       <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                   </div>
                               </div>
                               <div class="card bg-light text-white mb-4">
                                   <div class="card-body">Your current plan ({{\App\Models\User::where('id', auth()->user()->id)->first()->plan}})</div>
{{--                                   <div class="card-footer d-flex align-items-center justify-content-between">--}}
{{--                                       <a href="/job" class="small text-white stretched-link">View details</a>--}}
{{--                                       <div class="small text-white"><i class="fas fa-angle-right"></i></div>--}}
{{--                                   </div>--}}
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>




@endsection

