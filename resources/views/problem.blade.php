@extends('layouts.master')

@section('title', $problem->id.'번 문제')

@section('page_name', $problem->id.'번 문제')

@section('head')
    <link href="{{asset('css/pages/problem.css')}}">
    <script src="{{asset('js/pages/problem.js')}}" ></script>
@endsection
@section('content')
    <div class="container">
        <div class="tabs is-centered">
            <ul>
                <li class="is-active"><a>문제 및 제출</a></li>
                <li><a>맞은 사람</a></li>
                <li><a>제출 현황</a></li>
            </ul>
        </div>
        <section class="section columns">
            <div class="column is-half">
                <div>
                    <h3 class="title has-text-centered">문제</h3>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($problem->content) !!}
                </div>
                <div>
                    <h3 class="title" style="text-align: center;">입력 설명</h3>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($problem->inputContent) !!}
                </div>
                <br/>
                <div>
                    <h3 class="title" style="text-align: center;">출력 설명</h3>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($problem->outputContent) !!}
                </div>
                <br/>

                <div>
                    <h3 class="title" style="text-align: center;">제출</h3>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    <div id="monaco-container" style="min-height:500px;"></div>
                    <div id="SubmitButton" problem_id = {{$problem->id}}></div>
                </div>
            </div>
            <div class="column is-half">
                @for($i = 0; $i < $in_out->count() ; $i++)

                    <h3 class="title" style="text-align: center;">입출력 {{$i+1}} 설명</h3>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($in_out[$i]->descriptionContent) !!}
                    <br/>
                    <h4 style="text-align: center;">입력 예제 {{$i+1}}</h4>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($in_out[$i]->input) !!}
                    <br/>
                    <h4 style="text-align: center;">출력 예제 {{$i+1}}</h4>
                    <hr class="first_hr">
                    <hr class="second_hr">
                    {!! parsedown($in_out[$i]->output) !!}
                    <br/>
                @endfor
            </div>

        </section>
    </div>

@endsection
