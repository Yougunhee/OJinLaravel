@extends('layouts.master')

@section('title', '대회 목록')

@section('page_name', '대회 목록 '.$page.'/'.$data['max_page_num'])
@section('page_description')
    <h5 class="subtitle is-5">현재 서버 시간: <div id="ServerTimer" current_time="{{$now}}"></div></h5>
@endsection


@section('content')
    <div class="container">
        <section class="section columns">
            <div class="column">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>대회 이름</th><th>대회 시작 시간</th><th>대회 끝나는 시간</th><th>우승자</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['contests'] as $contest)
                        <tr>
                            <td><a href="/contestView/{{$contest->id}}">{{$contest->title}}</a></td>
                            <td>{{$contest->startTime}}</td>
                            <td>{{$contest->endTime}}</td>
                            <td>{{$contest->winner_name or "없음"}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
