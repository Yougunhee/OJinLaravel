<nav class="navbar is-fixed-top">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="{{asset('images/logo.png')}}" style="max-height: 45px;" alt="YGOJ" height="45">

        </a>
        <div class="navbar-burger burger" data-target="navbarDefault">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    </div>

    <div id="navbarDefault" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="">
                메인
            </a>
            <a class="navbar-item" href="">
                문제
            </a>
            @if($navbar_contest_info->count()!=0)
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="{{route('contestListView')}}">
                        대회 <span class="tag is-info">{{$navbar_contest_info->count()}}</span>
                    </a>
                    <div class="navbar-dropdown is-boxed">
                        @foreach($navbar_contest_info as $tmp_contest)
                            <a class="navbar-item" href="{{route('contestView', ['id'=>$tmp_contest->id])}}">
                                {{$tmp_contest->title}}
                            </a>
                        @endforeach
                    </div>
                </div>
            @else
                <a class="navbar-item" href="{{route('contestListView')}}">
                    대회
                </a>
            @endif
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field is-grouped">
                    <p class="control">
                        <a class="button" href="">
                            <span class="icon">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <span>로그인</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</nav>
@if($middle_box=='true')
    <div id="middle_box" style="height: 200px; margin-top: 50px; ">
        <div class="flex-center position-ref" style="height: 100%">
            <div class="content has-text-centered" style="width:100%;">
                <h2 class="title is-2">{{(!isset($page_name)||$page_name=='')?'YGOJ':$page_name}}</h2>
                {!! $page_description or '' !!}
            </div>
        </div>
    </div>
@endif

<script>
    window.$(document).ready(function() {

        // Check for click events on the navbar burger icon
        window.$(".navbar-burger").click(function() {

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            window.$(".navbar-burger").toggleClass("is-active");
            window.$(".navbar-menu").toggleClass("is-active");

        });
    });
</script>
