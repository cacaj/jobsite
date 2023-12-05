@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for a car?</h1>
                <h3>Please create an account.</h3>

            </div>
            <div class="col-md-6">
                <div class="card" id="card">
                    <div class="card-header">Register</div>
                    <form action="#" id="regUser" method="post">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" name="name" class="form-control" required>
                            @if($errors->has('name'))
                                <span class="text-danger">Please enter your full name</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            @if($errors->has('email'))
                                <span class="text-danger">Please enter your email address</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @if($errors->has('password'))
                                <span class="text-danger">Please enter your password</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" id="btnRegister">Register</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div id="message"></div>
            </div>
        </div>
    </div>
    <script>
        var url = "{{route('store.user')}}"
        document.getElementById("btnRegister").addEventListener("click", function (event){
            var form = document.getElementById("regUser");
            var card = document.getElementById("card");
            var messageDiv = document.getElementById('message')
            var formData = new FormData(form)
            messageDiv.innerHTML = ''
            var button = event.target
            button.disabled = true;
            button.innerHTML = 'Sending email...'
            fetch(url, {
                method: "POST",
                headers:{
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                body:formData
            }).then(response => {
                if(response.ok){
                    return response.json();
                }else{
                    throw new Error('Error')
                }
            }).then(data=>{
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML = '<div class="alert alert-success">Registration was successful. Please check your email to verify it!</div>'
                card.style.display = 'none'
            }).catch(error => {
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML = '<div class="alert alert-danger">Something went wrong, please try again!</div>'

            } )

        });
    </script>
@endsection

