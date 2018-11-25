
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$contest->title}}</title>
    <link href="{{asset('css/pages/contest.css')}}" rel="stylesheet" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body>
        <div class="container height100">
            <section class="section columns height100">
                <div class="column is-two-fifths">
                    <div class="vcenter" style="padding-left: 80px;padding-right:100px;">
                        <h2 class="title" style="text-align:left; margin-bottom: 20px;">{{$contest->title}}</h2>
                        <hr style="border-bottom: 2px solid rgba(0,0,0,0.1); margin:0; padding: 0;">
                        <hr class="second_hr">
                        <p style="text-align: left; margin-top: 10px;">
                        {{$contest->description}}
                        <p style="text-align: right;">{{$contest->author}}</p>
                        <div id="Timer" start_time="{{$contest->startTime}}" end_time="{{$contest->endTime}}" current_time="{{$serverTime}}"></div>
                        <br/>
                        <a href="{{route('contestListView')}}"><span><i class="fas fa-arrow-left"></i> 메뉴로 돌아가기</span></a>
                    </div>
                </div>
                <div class="column">
                    <div class="flex-center vcenter">
                        <div class="box set-maxheight" style="width: 100%;  margin-right: 80px;">
                            <div id="ContestBox" contest_id="{{$contest->id}}"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script>
            window.loading_svg = "{{asset('images/Pacman-loading.svg')}}";
        </script>
        <script src="{{asset('js/pages/contest.js')}}" ></script>
    </body>
</html>
