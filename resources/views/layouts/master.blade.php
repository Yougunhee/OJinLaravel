<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'YGOJ')</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @section('head')
            <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
            <script src="{{asset('js/app.js')}}"></script>
        @show
    </head>
    <body class="has-navbar-fixed-top position-ref">
        @component('partials.navbar')
            @slot('page_name')
                @yield('page_name')
            @endslot

            @slot('page_description')
                @yield('page_description', '')
            @endslot

            @slot('middle_box')
                @yield('middle_box', 'true')
            @endslot
        @endcomponent

        @yield('content')

        @component('partials.footer')
        @endcomponent
        <div id="Modal"></div>
    </body>
</html>
