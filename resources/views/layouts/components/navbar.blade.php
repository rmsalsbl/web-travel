{{-- <header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
            </ul>
            <div class="text-end">
                @guest
                <a  href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a  href="{{ route('register') }}" class="btn btn-warning">Sign-up</a> 
                @else
                <a href="{{ route('logout') }}" class="btn btn-outline-light me-2" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                @csrf
                </form>
                @endguest  
                </div>
        </div>
    </div>
</header> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data tempat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css'); }}">    
</head>
<header>
    <nav class="nav container">
        <p class="logo">Go travel</p>
        <ul class="nav_links">
            <li><a href="#home" class="nav-link">Home</a></li>
            <li><a href="#tripplan" class="nav-link">Trip plan</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li> 
            @guest
            <li><a href="{{ route('login') }}" target="blank" class="nav-menu">Login</a></li>
            @else
            <a href="{{ route('logout') }}" class="nav-menu" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ Auth::user()->name }}</a>
                <form action="{{ route('logout') }}" id="logout-form" method="POST">
                    @csrf
                </form>
                @endguest 
        </ul>
    </nav>
</header>

