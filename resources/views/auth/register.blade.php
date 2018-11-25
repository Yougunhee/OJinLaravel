@extends('layouts.master')

@section('page_name', '가입하기')
@section('title', '가입하기')

@section('head')
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div id="RegisterBox"></div>
@endsection
