<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>@yield('title','Dashboard')</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                <div class="text-center pt-4 pb-4"> <span class="db"><img style="max-width:350px" src="{{asset('images/ferro.jpg')}}" alt="logo"/></span> </div>
                <form class="form-horizontal" method="POST" action="{{route('login')}}"> @csrf
                    <div class="row pt-4 pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"> <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span> </div>
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="Usuario" required autocomplete="email" autofocus> @error('email') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong> </span> @enderror </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"> <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span> </div>
                                <input id="password" type="password" placeholder="Contraseña" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> @error('password') <span class="invalid-feedback" role="alert"> <strong>{{$message}}</strong> </span> @enderror </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="pt-4">
                                    <button class="btn btn-success float-right col-md-12" type="submit">Ingresar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>