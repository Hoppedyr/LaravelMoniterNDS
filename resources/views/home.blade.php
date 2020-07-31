@extends('layouts.masterLayout')

@section('sidebar')
    <div class="sticky-top ">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
            <a class="nav-link" href="/">HomePage</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($servers as $server)
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <a href="{{route('serverMainPage', ['serverMainPageId'=>$server->id])}}">{{ $server->parent }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
