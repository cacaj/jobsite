<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{route('home')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-home me-2"></i>CacajPortal</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if(auth()->user()->profile_pic)
                    <img class="rounded-circle" src="{{Storage::url(auth()->user()->profile_pic)}}" alt="" style="width: 40px; height: 40px;">
                @else
                    <img class="rounded-circle" src="{{asset('img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                @endif
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{auth()->user()->name}}</h6>
                <span>{{auth()->user()->user_type}}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('dashboard')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-tasks me-2"></i>Jobs</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('job.create')}}" class="dropdown-item">Create a job</a>
                    <a href="{{route('job.index')}}" class="dropdown-item">Your Jobs</a>
                </div>
            </div>
            <a href="{{route('applicants.index')}}" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Applicants</a>

        </div>
    </nav>
</div>
