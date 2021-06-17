@php
    use App\Models\Category;

        $data = [];
        $lang = app()->getLocale();
        $rows = Category::getCategory($lang);
        $tree = Category::buildTreeForSelectMultiLevel($rows);
        $data['parents'] = $tree;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('styles/responsive.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('custom_css')
</head>
<body>
{{--<header class="header">--}}
{{--    <div class="header_container">--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <a class="navbar-brand" href="{{route('indexPage')}}">Sublime</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}

{{--    <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--        <ul class="navbar-nav mr-auto">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Link</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    Dropdown--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                    <a class="dropdown-item" href="#">Action</a>--}}
{{--                    <a class="dropdown-item" href="#">Another action</a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--        <form class="form-inline my-2 my-lg-0">--}}
{{--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</nav>--}}
{{--</div>--}}
{{--</header>--}}
<header class="super_container">
    <!-- Header -->
    <header class="header">
        <div class="header_container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="{{route('indexPage')}}">Sublime</a></div>
                            <nav class="main_nav">
                                <ul>

{{--                                    <li class="hassubs">--}}
{{--                                        <div class="position-absolute">--}}
{{--                                            <a href="#">{{__('index.categories')}}</a>--}}
{{--                                            <ul>--}}
{{--                                                @foreach($tree as $item)--}}
{{--                                                    @include('includes.menu_header_navigation', ['item' => $item, 'dropdownMenuLink_id' => 0, 'firstParentElement' => true])--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
                                    <li><a class="btn btn-dark text-white" href="{{ route('product.add_product.create') }}">{{ __('index.add_product') }} </a></li>
                                    @guest
                                        @if (Route::has('login'))
                                            <li>
                                                <a class="btn btn-dark text-white" href="{{ route('login') }}">{{ __('index.login') }}</a>

                                        @endif

                                        @if (Route::has('register'))
                                                <a class="btn btn-dark text-white" href="{{ route('register') }}">{{ __('index.register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="btn btn-dark text-white dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('personal.index') }}">
                                                   home page
                                                </a>
                                                <a class="dropdown-item" href="{{route('messages')}}">
                                                    Messages<sup class="badge badge-warning">{{ count($messages) }}</sup>
                                                </a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest

                                    <div class="nav-item dropdown select-lang">
                                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> @if(app()->getLocale()=='en') English @elseif(app()->getLocale()=='ru') Русский @else Հայերեն @endif</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown09">
                                            <a href="{{ url('locale/hy')}}" class="dropdown-item" type="button">{{ __('message.armenian') }}</a>
                                            <a href="{{ url('locale/en')}}" class="dropdown-item" type="button">{{ __('message.english') }}</a>
                                            <a href="{{ url('locale/ru')}}" class="dropdown-item" type="button">{{ __('message.russian') }}</a>
                                        </div>
                                    </div>
                                </ul>
                            </nav>
                                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Search Panel -->
{{--        <div class="search_panel trans_300">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="search_panel_content d-flex flex-row align-items-center justify-content-end">--}}
{{--                            <form action="#">--}}
{{--                                <input type="text" class="search_input" placeholder="Search" required="required">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Social -->
        <div class="header_social">
            <ul>
                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </header>


@yield('content')

<!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                        <div class="footer_logo"><a href="#">Sublime.</a></div>
                        <div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
                        <div class="footer_social ml-lg-auto">
                            <ul>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('plugins/easing/easing.js') }}"></script>
<script src="{{ asset('plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('custom_js')
<script>

    $('.func_dropdown').click(function (){
        if($('.func_dropdown .dropdown-menu').css('display','block')){
            $('.func_dropdown .dropdown-menu').css('display','none')
        }else{
            $('.func_dropdown .dropdown-menu').css('display','block')
        }
    })
    $('.drop-local a').click(function (){
        $local = $(this).text()
        $('btn-local').text($local)
    })
    $('.hamburger').click(function (){
        $('.menu').addClass('active')
    })
    $('.menu_close').click(function (){
        $('.menu').removeClass('active');
    })
    jQuery(function($){
        $(document).mouseup(function (e){ // событие клика по веб-документу
            var div = $(".menu"); // тут указываем ID элемента
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                div.removeClass('active'); // скрываем его
            }
        });
    });
    $('.shrift-normal').hover(function() {
        $(this).find(">ul").slideToggle(0);
    })
</script>
</body>
</html>
