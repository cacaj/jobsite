<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CacajJob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">CacajJob</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                @if(Auth::check())

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user.user.profile')}}">Profile</a>
                    </li>

                @if(auth()->user()->user_type == 'admin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('subscribe')}}">Subscribe</a>
                </li>
                        @endif
                @endif
                @if(!Auth::check())
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('create.user')}}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('create.admin')}}">Admin</a>
                </li>
                @endif
                @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" id="logout" href="#">Logout</a>
                </li>
                @endif
                <form id="form-logout" action="{{route('logout')}}" method="post">@csrf</form>
            </ul>
            <span class="navbar-text">
        POWERED BY RC
      </span>
        </div>
    </div>
</nav>
@yield('content')

<script>
    let logout = document.getElementById('logout');
    let form = document.getElementById('form-logout');
    logout.addEventListener('click', function (){
        form.submit();

    });

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

