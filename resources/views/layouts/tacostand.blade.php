<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/yeti/bootstrap.min.css"/>
    <title>
        @yield('browser_title')
    </title>
</head>
<body>
<div class="container">
    @yield('page_title')
    @if(Session::has('success_message'))
        <div class="alert alert-success">{!! session('success_message') !!}</div>
        @endif
    @if(Session::has('error_message'))
        <div class="alert alert-warning">{!! session('error_message') !!}</div>
    @endif

    <div class="col-lg-6">
        @yield('content')
    </div>

</div>

</body>
</html>