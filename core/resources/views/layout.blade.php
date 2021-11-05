<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>{{ $title }} - {{$set->site_name}}</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="{{$set->m_c}}"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/swiper/css/swiper.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/wow/css/animate.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/asset/vendor/magnific-popup/css/magnific-popup.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/app.css" type="text/css">
        <link href="{{url('/')}}/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/asset/vendor/fontawesome/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/toast.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>
         @yield('css')
    </head>
<body data-style="default">
    <div class="boompay">
        <header class="navbar-header navbar-trans-fixed">
            <div class="container">
                <div class="header-inner">
                    <div class="toggle-menu">
                        <span class="bar bg-light"></span>
                        <span class="bar bg-light"></span>
                        <span class="bar bg-light"></span>
                    </div>
                    <div class="navbar-mobile-logo">
                        <a href="{{route('home')}}" class="logo">
                        <img style="max-width:80px;" src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo">
                        <img style="max-width:80px;" src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="sticky-logo">
                        </a>
                    </div>
                    <nav class="navbar-nav nav-dark">
                        <div class="close-menu">
                            <i class="fa fa-close"></i>
                        </div>
                        <div class="navbar-logo">
                            <a href="{{route('home')}}" class="logo">
                                <img style="max-width:5em;" src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="main-logo">
                                <img style="max-width:5em;" src="{{url('/')}}/asset/{{$logo->image_link}}" alt="logo" class="sticky-logo">
                            </a>
                        </div>
                        <div class="menu-wrapper" data-top="992">
                            <ul class="navbar-main-menu">
                                <li><a style="color:#51e372;" href="#">1 $BTBUSD = 1 USD</a></li>
                                <li><a href="https://bitbooll.io" target="_blank">{{__('Buy $BTBUSD')}}</a></li>
                                @if($set->plan==1)
                                <li><a href="{{route('plans')}}">{{__('Buy Crypto')}}</a></li>
                                @endif
                                @if($set->contact==1)
                                <li><a href="{{route('contact')}}">{{__('Contact us')}}</a></li>
                                @endif
                                  <li><a href="{{url('/')}}/page/7">{{__('Launchpad')}}</a></li>

                                <li><a href="{{route('about')}}">{{__('Coins')}}</a></li>
                                @if (Auth::guard('user')->check())
                                @else
                                <li><a href="{{route('login')}}">{{__('Login')}}</a></li>
                                @endif
                                @if($set->language==1)
                                    <li class="menu-item-has-children">
                                        @php $locale = session()->get('locale'); @endphp
                                        <a href="javascript:void;">
                                        @switch($locale)
                                            @case('fr')
                                            <span class="mb-0 text-sm"><span class="france"></span> French</span>
                                            @break
                                            @case('ge')
                                            <span class="mb-0 text-sm"><span class="germany"></span> German</span>
                                            @break
                                            @case('es')
                                            <span class="mb-0 text-sm"><span class="spain"></span> Spanish</span>
                                            @break
                                            @case('in')
                                            <span class="mb-0 text-sm"><span class="hindi"></span> Hindi</span>
                                            @break
                                            @case('ch')
                                            <span class="mb-0 text-sm"><span class="china"></span> China</span>
                                            @break
                                            @default
                                            <span class="mb-0 text-sm"><span class="usa"></span> English</span>
                                        @endswitch
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="{{url('/')}}/lang/en">English</a></li>
                                            <li><a href="{{url('/')}}/lang/fr">France</a></li>
                                            <li><a href="{{url('/')}}/lang/ge">Germany</a></li>
                                            <li><a href="{{url('/')}}/lang/ch">China</a></li>
                                            <li><a href="{{url('/')}}/lang/in">Hindi</a></li>
                                            <li><a href="{{url('/')}}/lang/es">Spanish</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                            <div class="nav-right">
                                @if (Auth::guard('user')->check())
                                <a href="{{route('user.dashboard')}}" class="nav-btn">{{__('Dashboard')}}</a>
                                @else
                                <a href="{{route('register')}}" class="nav-btn">{{__('Join us')}}</a>
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
@yield('content')
        <footer id="footer" class="wow soneFadeUp">
            <div class="container">
                <div class="footer-nner">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="widget footer-widget style_logo">
                                        <p>{{$set->site_desc}}</p>
                                        @if($set->contact==1)
                                            <p>{{$set->email}}<br>{{$set->mobile}}</p>
                                            <p>{{$set->address}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('Quick links')}}</span>
                                        <ul class="footer-menu">
                                            <li><a href="{{route('user.plans')}}">{{__('Buy Crypto')}}</a></li>
                                            <li><a href="{{route('user.ticket')}}">{{__('Disputes')}}</a></li>
                                            <li><a href="{{route('user.fund')}}">{{__('Fund account')}}</a></li>
                                            @if(count($faq)>0)
                                                <li><a href="{{route('user.ownbank')}}">{{__('Send money')}}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('Company')}}</span>
                                        <ul class="footer-menu">
                                            <li><a href="{{route('about')}}">{{__('Coins')}}</a></li>
                                            <li><a href="{{route('terms')}}">{{__('Terms & Conditions')}}</a></li>
                                            <li><a href="{{route('privacy')}}">{{__('Privacy Policy')}}</a></li>
                                            <li><a href="{{route('contact')}}">{{__('Contact Us')}}</a></li>
                                            @if(count($faq)>0)
                                                <li><a href="{{route('faq')}}">{{__('FAQs')}}</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="widget footer-widget">
                                        <span class="widget-title text-uppercase">{{__('More')}}</span>
                                        <ul class="footer-menu">
                                            @foreach($pages as $vpages)
                                                @if(!empty($vpages))
                                                    <li><a href="{{url('/')}}/page/{{$vpages->id}}">{{$vpages->title}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="site-info">
                    <div class="copyright">
                        <p>{{$set->site_name}}  &copy; {{date('Y')}}. {{__('All Rights Reserved.')}}</p>
                    </div>
                    <ul class="footer-social-link">
                        @foreach($social as $socials)
                            @if(!empty($socials->value))
                                <li><a href="{{$socials->value}}" class="icon-{{$socials->type}}"><i class="fab fa-{{$socials->type}}"></i></a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </footer>
        {!!$set->livechat!!}
        <a href="#header" data-type="section-switch" class="return-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="{{url('/')}}/asset/vendor/popper.js/popper.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/asset/js/particles.js"></script>
        <script src="{{url('/')}}/asset/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/swiper/js/swiper.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery.appear/jquery.appear.js"></script>
        <script src="{{url('/')}}/asset/vendor/wow/js/wow.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/countUp.js/countUp.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/jquery.parallax-scroll/js/jquery.parallax-scroll.js"></script>
        <script src="{{url('/')}}/asset/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="{{url('/')}}/asset/vendor/theia-sticky-sidebar/theia-sticky-sidebar.min.js"></script>
        <!-- Site Scripts -->
        <script src="{{url('/')}}/asset/js/header.js"></script>
        <script src="{{url('/')}}/asset/js/app.js"></script>
        <script src="{{url('/')}}/asset/js/toast.js"></script>
        @yield('script')
        @if (session('success'))
            <script>
            "use strict";
            toastr.success("{{ session('success') }}");
            </script>
        @endif

        @if (session('alert'))
            <script>
            "use strict";
            toastr.warning("{{ session('alert') }}");
            </script>
        @endif
        </div>
    </body>
</html>
