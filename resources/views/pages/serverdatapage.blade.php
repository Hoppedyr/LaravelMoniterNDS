@extends('layouts.masterLayout')

@section('sidebar')
<div class="sticky-top ">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-item" href="/">Home Page</a>
        </li>
        <li class="nav-item">
            <a class="nav-item" href="{{route('serverMainPage', ['serverMainPageId' => $serverId ])}}">Server Home</a>
        </li>
        @foreach ($pageData as $key => $value)
        <li class="nav-item">
            <a href="{{route('serverDataPage', ['serverDataPageId'=>$key, 'serverMainPageId'=> $serverId] )}}">{{ $key }}</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection

@section('content')
    <h3>{{$serverData->overskrift}}</h3>
    <div class="card bg-light border-0">
        <div class="card-body">
            <ol>
                @foreach ($serverData->lines as $item)
                <li>
                    {{$item->txt}} -> <span class="badge"><a class="nav-link" target="_blank" href="http://{{$item->url}}">Server Home</a></span>
                </li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection
