<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("error_title")</title>
    <link href="{{asset('css/pages/error.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            @yield('error_content')
            <br/>
            @section('error_message')
                {{$exception -> getMessage()}}
            @show
            <p onclick="history.back();" >Back</p>
        </div>
    </div>
</div>
</body>
</html>
