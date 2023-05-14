@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data tempat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css'); }}">    
</head>
<body>
    {{-- <header>
        <nav class="nav container">
            <p class="logo">Go travel</p>
            <ul class="nav_links">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#tripplan" class="nav-link">Trip plan</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li> 
                <li><a href="/login" target="blank" class="nav-menu">Login</a></li>
            </ul>
        </nav>
    </header> --}}
    <section class="homeContainer" id="home">
        <div class="home-text">
        <h2>Let us show you the world</h2>
        <p>adventure around the world safely, fun and comfortable with us</p>
        <button class="btn">See the world</button>
    </div>
    </section>
    <section class="tripContainer" id="tripplan">
        <div class="title">
        <h2 class="subtitle">Add your dream place</h2>
        <p class="desk">add all the places you want to visit</p>
    </div>
    <div class="container mt-2">
        {{-- <div class="row"> --}}
            {{-- <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2 class="jdldata"> Trip plan </h2>
                </div>
                <div class="pull-right mb-2">
                {{-- ini url di route yang buat nampilin form create data  
                <a class="btn btn-outline-secondary" href="{{ url('/travel/data/create') }}">Add dream place</a>
                </div>
            </div> --}}
            <div class="container">
                <div class="row">
                  <div class="col-sm-8">
                    <div class="pull-left">
                        <h2 class="jdldata"> Trip plan </h2>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="pull-right mb-2">
                        {{-- ini url di route yang buat nampilin form create data  --}}
                        <a class="btn btn-outline-secondary" href="{{ url('/travel/data/create') }}">Add dream place</a>
                        </div>
                  </div>
                </div>              
        </div>

        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        {{-- <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name place</th>
                <th>Desc</th>
                <th>Image</th>
                <th width="280px">Action</th>
            </tr> --}}
            {{-- variabel $data ini diambil dari method index di KaryawanController --}}
            @foreach ($data as $item)
            <section  class="data">
                <div class="data-box">
                    <img src="/image/{{ $item->image }}" alt="" height="160" width="190">
                    <div class="isi">
                    <div class="tema">{{ $item->name }}</div>
                    <div class="deskripsi"><br>{{ $item->desc }}</div>
                    <div class="container">
                        <div class="row">
                          <div class="col">
                            <button class="ubah"><a href="{{ url("/travel/$item->id/edit") }}">Edit</a></button>
                          </div>
                          <div class="col">
                        <form action="{{ url("/travel/$item->id") }}" method="Post">
                        @csrf
                        @method( 'DELETE')
                        <button type="submit" class="hapus">Delete</button>
                        </form>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
                {{-- <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->desc }}</td>
                    <td><img src="/image/{{ $item->image }}" width='100px'></td>
                    <td> --}}
                {{-- route aksi untuk hapus --}}
                {{-- <form action="{{ url("/travel/$item->id") }}" method="Post"> --}}
                    {{-- route aksi untuk edit --}}
                    {{-- <a class="btn btn-primary" href="{{ url("/travel/$item->id/edit") }}">Edit</a> --}}
                    {{-- @csrf
                    @method( 'DELETE') --}}
                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                {{-- </form>
                </td>
            </tr> --}}
            </section>
        @endforeach
        {{-- </div>
    </table> --}}
</section>
</body>
</html>