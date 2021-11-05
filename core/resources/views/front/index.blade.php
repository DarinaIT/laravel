@extends('layout')
@section('css')

@stop
@section('content')
<div style="background-color:{{$set->m_c}};">
    <section id="header" class="backg backg-one moving-bg">
        <div class="container">
            <div class="backg-content-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="backg-content">
                            <h1 class="backg-title wow soneFadeUp" data-wow-delay="0.5s">{{$ui->header_title}}</h1>
                            <p class="description wow soneFadeUp text-light" data-wow-delay="0.6s">
                            {{$ui->header_body}}
                            </p>
                            <a class="btn btn-sm btn-soft-primary btn-pill" href="{{route('register')}}">{{__('Get Started')}}<i class="fas fa-angle-right ml-1"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="promo-mockup mockup-mobile wow soneFadeUp">
                            <img class="mockup-mobile-img-1" src="{{url('/')}}/asset/images/{{$ui->s6_image}}" alt="header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="feature-box">
                        <div class="row">
                            <div class="col-lg-6 flex-center">
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="{{url('/')}}/asset/images/icon_staking.svg" width="200px"></div>
                                    <div class="featured-icon-box-content">
                                        <span style="color:white;"  class="featured-icon-box-title">{{$ui->item1_title}}</span>
                                        <p style="color:#ffc107 !important;">{{$ui->item1_body}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="{{url('/')}}/asset/images/icon_dex.svg" width="200px"></div>
                                    <div class="featured-icon-box-content">
                                        <span style="color:white;" class="featured-icon-box-title">{{$ui->item2_title}}</span>
                                        <p style="color:#ffc107 !important;">{{$ui->item2_body}}</p>
                                    </div>
                                </div>
                                <div class="featured-icon-box-wrapper style-five">
                                    <div class="featured-icon-box-icon"><img src="{{url('/')}}/asset/images/icon_wallet.svg" width="200px"></div>
                                    <div class="featured-icon-box-content">
                                        <span style="color:white;" class="featured-icon-box-title">{{$ui->item3_title}}</span>
                                        <p style="color:#ffc107 !important;">{{$ui->item3_body}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 flex-center">
                    <div class="section-title style-two">
                        <h2 class="title">{{$ui->s2_title}}</h2>
                        <p style="color:#ffc107;">{{$ui->s2_body}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@if($set->services==1)
<section class="services pb-150 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color:{{$set->s_c}};">{{__('Services')}}</span>
            <p class="title">{{$ui->s4_title}}</p>
            <p>{{$ui->s4_body}}</p>
        </div>

        <div class="row gap-y">
        @foreach($service as $services)
            <div class="col-md-6 col-xl-3">
                <div class="services-box-wrapper text-center bg-white">
                    <div class="my-3 services-box-icon bg-white" style="color:{{$set->s_c}};"><i class="fa fa-{{$services->icon}}"></i></div>
                    <span class="mb-20 fw-500 text-black">{{$services->title}}</span>
                    <p class="castrooo">{{$services->details}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endif
<section class="informes wow soneFadeRight">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="editure-feature-image">
                    <div class="image-one">
                        <img src="{{url('/')}}/asset/images/{{$ui->s7_image}}" class="wow soneFadeRight r10" data-wow-delay="0.3s" alt="feature-image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="img-text-content">
                    <div class="section-title">
                        <h2 class="title">{{$ui->s6_title}}</h2>
                        <p style="color:#ffc107;">{{$ui->s6_body}}</p>
                    </div>
                    <a href="{{route('about')}}" class="btn btn-sm btn-soft-primary btn-pill">{{__('Learn More')}}<i class="fas fa-angle-right ml-1"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@if($set->plan==1)
<section class="pricing-two pt-100 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: {{$set->s_c}};">{{__('Trading Packages')}}</span>
            <h2 class="title">{{__('Choose your crypto trading package.')}}</h2>
        </div>
        <div class="row advanced-pricing-table no-gutters">
            @foreach($plan as $val)
            <div class="col-lg-3">
                <div class="pricing-table bg-white">
                    <div class="pricing-header pricing-amount">
                        <h2 class="price-title">{{$val->name}}</h2>
                        <p class="castrooo">{{$val->comment}}</p>
                        <div class="imgHolder">
                        <img src="asset/images/{{$val->image}}" style="padding:5px;border-radius:1em;" width="100%">
                        @if($val->free==1)
                        <span >Free Gift</span>
                        @endif
                        </div>
                        <div class="monthly_price">
                            <h2 class="price" style="color: {{$set->s_c}};"><span style="color:black;">{{$currency->symbol}}</span>{{number_format($val->min_deposit)}}</h2>
                            <b style="color:black;font-weight:blod !important;">${{number_format($val->min_deposit)}}</b>
                        </div>
                        <div class="small_desc text-center">
                            <span class="castrooo">{{__('Locked For')}} {{$val->duration}} {{$val->period}}(s)</span><br>
                            <span class="castrooo">{{$val->percent}}% {{__('Yield')}}</span><br>
                            <span class="castrooo">{{$currency->symbol.number_format($val->amount)}} {{__('Maximum')}}</span><br>
                            @if($val->ref_percent!=null)
                            <span class="castrooo">{{$val->ref_percent}}% {{__('Referral Percent')}}</span><br>
                            @endif
                            @if($val->bonus!=null)
                            <span class="castrooo">{{$val->bonus}}% {{__('PRO Trading Bonus')}}</span><br>
                            @endif
                        </div>
                        <a class="btn btn-sm btn-soft-primary2 btn-pill" href="{{route('register')}}">{{__('Get Started')}}<i class="fas fa-angle-right ml-1"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@if($set->review==1)
    @if(count($review)>0)
        <section class="testimonials-two wow soneFadeUp" id="testimonialxx">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="sub-title" style="color: {{$set->s_c}};">{{__('Reviews')}}</span>
                            <h2 class="title">{{$ui->s7_title}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="testimonial-wrapper">
                            <div class="swiper-container" id="testimonial-two" data-speed="700" data-autoplay="7000" data-perpage="3" data-space="50" data-breakpoints='{"991": {"slidesPerView": 1}}'>
                                <div class="swiper-wrapper">
                                    @foreach($review as $vreview)
                                        <div class="swiper-slide">
                                            <div class="testimonial-two">
                                                <div class="testi-content-inner">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                    <div class="testimonial-content">
                                                        <p>{!!$vreview->review!!}</p>
                                                    </div>
                                                    <div class="testimonial-bio">
                                                        <div class="avatar"><img src="{{url('/')}}/asset/review/{{$vreview->image_link}}" alt="testimonial"></div>
                                                        <div class="bio-info">
                                                            <h4 class="name">{{$vreview->name}}</h4>
                                                            <p class="job">{{$vreview->occupation}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
@if($set->team==1)
    @if(count($team)>0)
        <section class="teams-single wow soneFadeUp d-none d-lg-block">
            <div class="container">
                <div class="section-title text-center">
                    <h3 class="sub-title" style="color: {{$set->s_c}};">{{__('Our Tokens')}}</h3>
                    <h2 class="title">{{$ui->s3_body}}</h2>
                    <p style="color:#ffc107;"> {{$ui->team}}</p>
                </div>
                <div class="row">
                    @foreach($team as $val)
                        <div class="col-md-3">
                            <div class="team-member">
                                <div class="member-avater"><img src="{{url('/')}}/asset/review/{{$val->image}}" alt="avater">
                                    <div class="layer-one">
                                        <div class="team-info">
                                            <span class="name">{{$val->name}}</span>
                                            <p></p>
                                            <a class="btn btn-sm btn-soft-primary2 btn-pill" href="{{$val->facebook}}">BUY<i class="fas fa-angle-right ml-1"></i></a>
                                        </div>
                                    </div>

                                    <ul class="member-social">
                                        <li><a href="{{$val->facebook}}"><i class="fab fa-internet-explorer"></i></a></li>
                                        <li><a href="{{$val->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$val->linkedin}}"><i class="fab fa-telegram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endif
@if($set->stat==1)
<section class="countup">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title" style="color: {{$set->s_c}};">{{__('Get Assured Profits')}}</span>
            <p class="title">{{$ui->s8_title}}</p>
            <p style="color:#ffc107;">{{$ui->s8_body}}</p>
        </div>
        <div class="countup-wrapper">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: {{$set->s_c}};width: min-intrinsic;width: -webkit-min-content;width: -moz-min-content;width: min-content;">{{$currency->symbol.number_format($t_profit)}}</h4></div>
                        <p style="color:white;">Profit Shared</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: {{$set->s_c}};width: min-intrinsic;width: -webkit-min-content;width: -moz-min-content;width: min-content;">{{$currency->symbol.number_format($t_amount)}}</h4></div>
                        <p style="color:white;">Money Invested</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: {{$set->s_c}};width: min-intrinsic;width: -webkit-min-content;width: -moz-min-content;width: min-content;">{{$currency->symbol.number_format($t_bonus)}}</h4></div>
                        <p style="color:white;">Trading Bonus</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <h4 class="count" style="color: {{$set->s_c}};width: min-intrinsic;width: -webkit-min-content;width: -moz-min-content;width: min-content;">{{$currency->symbol.number_format($t_payout)}}</h4></div>
                        <p style="color:white;">Payouts</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endif
@stop
