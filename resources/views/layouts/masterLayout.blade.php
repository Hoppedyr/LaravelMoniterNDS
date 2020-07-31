<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
    <div class="container-fluid card border-0 bg-light">
        <header>
            @include('includes.header')
        </header>
        <div id="main" class="row card-body">
            <!-- sidebar content -->
            <div id="sidebar" class="col-2 card border-0">
                <div class="card-body">
                    @yield('sidebar')
                </div>
            </div>
            <!-- main content -->
            <div id="content" class="col-10 card border-0">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
