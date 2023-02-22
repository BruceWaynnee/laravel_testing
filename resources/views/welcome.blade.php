<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- stylesheet -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            body { font-family: 'Nunito', sans-serif; }
        </style>
    </head>
    <body class="antialiased" style="background-color: #093371;">
        <div class="home-content-wapper w-75 bg-dark mx-auto my-3 py-3 px-5 rounded-4" style="height: 34.7rem !important;">
            <div class="title-block">
                <h2 class="text-danger text-center" style="font-weight: bold; font-size: 2.7rem;">Welcome To Laravel Testing Project</h2>
            </div>
            <div class="body-block text-white">
                <p class="mt-4" style="font-size: 17px;">About This Project :</p>
                <span class="mt-5" style="margin-left: 1rem;">This project was created as a practice project to writing a test with Laravel, but after carefully studied and read some<br> base practice to get start of writing Laravel test, we better having a small working feature in order to really test the units <br>and feature of the system as well as database and route, so that's why I include this little user management dashboard <br>into this project in order to test the feature and writing a test based on this project logic.<br><br>Also noted that this project was created for testing, so some based practice folder structure will not be include much <br>in here so that the other dev could read it.</span>
                <div class="d-flex my-3 m-auto" style="width: 10rem;">
                    <img class="w-100" src="{{ asset('img/nerv.png') }}" alt="nerv icon">
                </div>
            </div>
            <div class="footer-block">
                <div class="text-end">
                    @if ( Route::has('login') )
                        <div class="hidden">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-outline-success">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-light" style="margin-right: .5rem;">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-outline-danger">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
                <small class="text-white">Developer: Verak Satya</small>
            </div>
        </div>
    </body>
</html>
