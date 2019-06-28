<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/picto-auditif-rose.svg')}}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- <script src="{{ asset('uikit/js/uikit-icons.min.js') }}" defer></script>
    <script src="{{ asset('uikit/js/uikit.min.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('uikit/css/uikit-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('uikit/css/uikit.min.css') }}" rel="stylesheet"> -->
    
    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/css/uikit.min.css" />

<!-- UIkit JS -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.5/js/uikit-icons.min.js"></script>
<link href="{{ asset('/app5/css/custom.css') }}" rel="stylesheet">
 <script src="{{ asset('/app5/js/custom.js') }}" defer></script>
</head>
<body>
<div class="uk-margin">
    <nav style="font-weight: bold" class="uk-navbar-container uk-navbar" uk-navbar="dropbar: true; dropbar-mode: push">
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav" id="cate">
                <li>
                    <a href="/app5/" uk-icon="icon: home" class="uk-icon"></a>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a href="{{ url('/app5/category/22/about-me.html') }}" title="{{__('general.aboutme')}}">{{__('general.aboutme')}}</a>
                </li>
                <li>
                    <a href="{{ url('/app5/category/44/about-app.html') }}" title="{{__('general.aboutapp')}}">{{__('general.aboutapp')}}</a>
                </li>
                <li>
                @if(Session::get('locale')=='en')
                    <input type="hidden" id="lang-locale" value="{{Session::get('locale')=='en'}}">
                    <a href="{{asset('/app5/set/language/km')}}" title="{{__('general.language')}}">
                    <span class="uk-icon uk-icon-image uk-margin-small-right" style="background-image: url('https://cdn.countryflags.com/thumbs/cambodia/flag-400.png');"></span>
                    </a>
                @else
                    <input type="hidden" id="lang-locale" value="{{Session::get('locale')=='en'}}">
                    <a href="{{asset('/app5/set/language/en')}}" title="{{__('general.language')}}">
                    <span class="uk-icon uk-icon-image uk-margin-small-right" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Flag_of_Great_Britain_%281707%E2%80%931800%29.svg/255px-Flag_of_Great_Britain_%281707%E2%80%931800%29.svg.png');"></span>
                    </a>
                @endif
                <li>
                @guest
                <div class="uk-button-group" style="margin-top: 30px;cursor: pointer" title="{{__('general.login')}}">
                <span class="uk-margin-small-right uk-icon" uk-icon="user"></span>
                    <div uk-dropdown="mode: click; boundary: ! .uk-button-group; boundary-align: true;">
                        <ul class="uk-nav uk-dropdown-nav">
                            <li><a href="{{asset('/app5/auth/linkedin')}}" title="{{__('general.linkedin')}}"><span class="uk-margin-small-right uk-icon" uk-icon="linkedin"></span>{{__('general.linkedin')}}</a></li>
                            <li class="uk-nav-divider"></li>
                            <li><a href="{{asset('/app5/auth/facebook')}}" title="{{__('general.facebook')}}"><span class="uk-margin-small-right uk-icon" uk-icon="facebook"></span>{{__('general.facebook')}}</a></li>
                        </ul>
                    </div>
                </div>
                @else
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ Auth::user()->name }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
                </li>
                </li>
            </ul>
        </div>
    </nav>
</div>
    <div class="uk-container">
    <div class="uk-divider-icon"></div>
        <div class="uk-grid-small uk-grid-divider uk-grid" uk-grid="">
            <div class="uk-width-1-5@m uk-grid-margin uk-first-column"><div class="uk-panel">1-5-M</div></div>
            <div class="uk-width-3-5@m uk-grid-margin">
                <div class="uk-panel">
                    @yield('content')
                </div>
            </div>
            <div class="uk-width-1-5@m uk-grid-margin"><div class="uk-panel">1-5-M</div></div>
        </div>
    </div>
    <div class="uk-divider-icon"></div>
    <div class="uk-section uk-section-secondary uk-section-small" style="padding-bottom:0px">
        <p class="uk-text-large uk-text-center">TIME OF MY ACHEIVEMENT</p>
            <div class="uk-divider-icon"></div>
        <div class="uk-container">
            <div class="uk-margin-large uk-grid-match uk-child-width-1-3@m uk-grid" uk-grid="">
                <div class="uk-first-column">
                    <p>A RESTful API is an application program interface (API) that uses HTTP requests to GET, PUT, POST and DELETE data.
                    <br/>A RESTful API -- also referred to as a RESTful web service -- is based on representational state transfer (REST) technology, an architectural style and approach to communications often used in web services development.</p>
                </div>
                <div>
                    <p>Laravel already makes it easy to perform authentication via traditional login forms, but what about APIs? APIs typically use tokens to authenticate users and do not maintain session state between requests. Laravel makes API authentication a breeze using Laravel Passport, which provides a full OAuth2 server implementation for your Laravel application in a matter of minutes. Passport is built on top of the League OAuth2 server that is maintained by Andy Millington and Simon Hamp.</p>
                </div>
                <div>
                <div class="uk-width-medium-1-5 uk-text-center uk-row-first">
                        <div class="uk-thumbnail uk-overlay-hover uk-border-circle">
                            <figure class="uk-overlay">
                                <img class="uk-border-circle" width="200" height="200" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMjAwcHgiIGhlaWdodD0iMjAwcHgiIHZpZXdCb3g9IjAgMCAyMDAgMjAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyMDAgMjAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIi8+DQo8Zz4NCgk8cGF0aCBmaWxsPSIjRDhEOEQ4IiBkPSJNMTgyLjI1NiwxNjUuNzk2Yy0wLjgzNi00LjY3Ny0xLjg5Ni05LjAwNy0zLjE3Mi0xMy4wMDFjLTEuMjc3LTMuOTk2LTIuOTk1LTcuODg4LTUuMTU0LTExLjY4Ng0KCQljLTIuMTU4LTMuNzkzLTQuNjMxLTcuMDI4LTcuNDI3LTkuNzA1Yy0yLjgwMS0yLjY3NC02LjIxMy00LjgxMi0xMC4yNDctNi40MDljLTQuMDM1LTEuNTk3LTguNDg4LTIuMzk2LTEzLjM1OS0yLjM5Ng0KCQljLTAuNzE5LDAtMi4zOTYsMC44NTgtNS4wMzIsMi41NzNjLTIuNjM2LDEuNzIyLTUuNjEyLDMuNjM4LTguOTI3LDUuNzVjLTMuMzE2LDIuMTE4LTcuNjMxLDQuMDM1LTEyLjk0LDUuNzUzDQoJCWMtNS4zMTIsMS43MTktMTAuNjQ2LDIuNTc2LTE1Ljk5NiwyLjU3NmMtNS4zNTIsMC0xMC42ODQtMC44NTctMTUuOTk2LTIuNTc2Yy01LjMxNC0xLjcxOC05LjYyOS0zLjYzNS0xMi45NC01Ljc1Mw0KCQljLTMuMzE5LTIuMTEyLTYuMjkxLTQuMDI4LTguOTI3LTUuNzVjLTIuNjM2LTEuNzE1LTQuMzEyLTIuNTczLTUuMDMzLTIuNTczYy00Ljg3NiwwLTkuMzI5LDAuNzk5LTEzLjM2MSwyLjM5Ng0KCQljLTQuMDMzLDEuNTk4LTcuNDUxLDMuNzM1LTEwLjI0Miw2LjQwOWMtMi44MDEsMi42NzctNS4yNzMsNS45MTItNy40Myw5LjcwNWMtMi4xNTcsMy43OTgtMy44NzcsNy42ODgtNS4xNTMsMTEuNjg2DQoJCWMtMS4yNzgsMy45OTQtMi4zMzcsOC4zMjQtMy4xNzcsMTMuMDAxYy0wLjgzNyw0LjY3MS0xLjM5OCw5LjAyNC0xLjY3NywxMy4wNmMtMC4yNzksNC4wMzMtMC40MTksOC4xNy0wLjQxOSwxMi4zOTkNCgkJYzAsMy4xNCwwLjM0NSw2LjA0LDAuOTY5LDguNzQ1aDE2Ni43NzFjMC42MjUtMi43MDUsMC45NzItNS42MDUsMC45NzItOC43NDVjMC00LjIyOS0wLjE0MS04LjM2Ni0wLjQyMi0xMi4zOTkNCgkJQzE4My42NTQsMTc0LjgyLDE4My4wOTYsMTcwLjQ2NywxODIuMjU2LDE2NS43OTZ6Ii8+DQoJPHBhdGggZmlsbD0iI0Q4RDhEOCIgZD0iTTEwMCwxMzAuMjY4YzEyLjcsMCwyMy41NDQtNC40OTQsMzIuNTMzLTEzLjQ3OWM4Ljk4NC04Ljk4OCwxMy40NzktMTkuODMsMTMuNDc5LTMyLjUzMg0KCQljMC0xMi43MDItNC40OTQtMjMuNTQzLTEzLjQ3OS0zMi41MzFDMTIzLjU0NCw0Mi43MzgsMTEyLjcsMzguMjQzLDEwMCwzOC4yNDNzLTIzLjU0Nyw0LjQ5NS0zMi41MzEsMTMuNDgxDQoJCWMtOC45ODksOC45ODgtMTMuNDgxLDE5LjgyOS0xMy40ODEsMzIuNTMxYzAsMTIuNzAyLDQuNDkyLDIzLjU0NCwxMy40ODEsMzIuNTMyQzc2LjQ1MywxMjUuNzczLDg3LjMsMTMwLjI2OCwxMDAsMTMwLjI2OHoiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <hr>
        <div class="tm-footer">
            <div class="uk-container uk-container-center uk-text-center">
                <ul class="uk-subnav uk-subnav-line uk-flex-center">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">{{__('general.aboutme')}}</a></li>
                    <li><a href="#">{{__('general.aboutapp')}}</a></li>
                    <li><a href="#">Site Map</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
                <div class="uk-panel">
                    <p>Made and Designed by <a href="/" title="TOMA" alt="TOMA">TOMA </a> with research and practice time.<br>&copy; All Rights Reserved.</p>
                </div>
                <a href="/"><img src="{{ asset('img/picto-auditif-rose.svg') }}" width="50px" height="50px" title="TOMA" alt="TOMA"></a>
            </div>
        </div>
        <br/>
    </div>
    <script>
        $(document).ready(function(){
            var langLocale = $("#lang-locale").val();
            var cat_id = {!! json_encode($cat_id) !!};
            
            get_data()
        function get_data() {
            var str = '';
            $.ajax({
            type:"GET",
            dataType: "json",
            url:"/app5/api/v1/categories",
            success:function(data)
            {
                if (data.status == 200) {
                    if (langLocale == 1) {
                        data.data.forEach(function (d) {
                            let a = `class${cat_id==d.id ? "='uk-active'" : ""}`;
                            str += `<li `+a+`><a href="/app5/category/` + d.id + `/` + d.cat_name.replace(/\s+/g, '-').toLowerCase() + `.html">
                                ` + d.cat_name + `                       
                            </a></li>`;
                            console.log(d.id,d.cat_name_kh,cat_id);
                        });
                        }else{
                            data.data.forEach(function (d) {
                                let a = `class${cat_id==d.id ? "='uk-active'" : ""}`;
                            str += `<li `+a+`><a href="/app5/category/` + d.id + `/` + d.cat_name.replace(/\s+/g, '-').toLowerCase() + `.html">
                            ` + d.cat_name_kh + `                       
                        </a></li>`;
                        console.log(d.id,d.cat_name_kh);
                            });
                        }                        
                    }
                    $("#cate").append(str);
                }  
            }); 
        }                               
        });
    </script> 
</body>
</html>
