@extends('layouts.masterLayout')

@section('sidebar')
    <div class="sticky-top ">
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-item" href="/">Home Page</a>
            </li>
            @foreach ($pageData as $key => $value)
                <li class="nav-item">
                    <a href="{{route('serverDataPage', ['serverDataPageId'=>$key, 'serverMainPageId'=> $viewDataPage->id] )}}">{{ $key }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection


@section('content')
    <div class="card border-0 bg-light">
        <div class="card-body">
            <h3>Welcome To The HomePage Of {{$viewDataPage->parent}}</h3>
        </div>
    </div>
@endsection
