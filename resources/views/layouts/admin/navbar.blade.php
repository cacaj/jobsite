<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="{{route('home')}}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-home"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Message</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        @if(auth()->user()->profile_pic)
                        <img class="rounded-circle" src="{{Storage::url(auth()->user()->profile_pic)}}" alt="" style="width: 40px; height: 40px;">
                        @else
                            <img class="rounded-circle" src="{{asset('img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                        @endif
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Rinas send you a message</h6>
                            <small>15 minutes ago</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all message</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notification</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                @if(auth()->user()->profile_pic)
                    <img class="rounded-circle" src="{{Storage::url(auth()->user()->profile_pic)}}" alt="" style="width: 40px; height: 40px;">
                @else
                    <img class="rounded-circle" src="{{asset('img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{route('user.profile')}}" class="dropdown-item">My Profile</a>
                <a href="{{route('subscribe')}}" class="dropdown-item">Subscription</a>
                <form id="form-logout" action="{{route('logout')}}" method="post">@csrf</form>
                <a type="submit" class="dropdown-item" id="logout">Logout</a>
            </div>
        </div>
    </div>
</nav>
<script>
    let logout = document.getElementById('logout');
    let form = document.getElementById('form-logout');
    logout.addEventListener('click', function (){
        form.submit();

    });

</script>
