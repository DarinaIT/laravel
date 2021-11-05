@extends('layout')
@section('css')

@stop
@section('content')
<section id="header" class="backg backg-one" style="background-color: transparent; background-image: linear-gradient(to top, #000000 0%, #000000 60%);">
    <div class="container">
        <div class="backg-content-wrap">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="backg-content">
                        <span class="discount wow soneFadeUp" style="background-color: {{$set->s_c}};" data-wosw-delay="0.3s">{{$set->title}}</span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        {{__('Buy Coins')}}
                        </span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        {{__('Stake Coins')}}
                        </span><br>
                        <span class="backg-title wow soneFadeUp" data-wow-delay="0.5s">
                        {{__('Swap Coins')}}
                        </span><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-shape bg-shape-bottom">
        <img src="{{url('/')}}/asset/images/shape-bg.png">
    </div>
</section>
<section class="pricing-two pt-100 wow soneFadeUp">
    <div class="container">
        <div class="section-title text-center">
            <h1 style="color: {{$set->s_c}};">{{__('Active Cryptocurrency Packages And Deals')}}</h1>
            <p class="title">
            {{__('Choose your pricing policy which affordable')}}
            </p>
        </div>
        <div class="row advanced-pricing-table no-gutters">
            @foreach($plan as $val)
            <div class="col-lg-3">
                <div class="pricing-table" style="background-color: {{$set->m_c}};">
                    <div class="pricing-header pricing-amount">
                        <h2 class="price" style="color: {{$set->s_c}};">{{$val->name}}</h2>
                        <p style="color:white;min-height:50px:">{{$val->comment}}</p>
                        <div class="imgHolder">
                        <img src="asset/images/{{$val->image}}" style="padding:5px;border-radius:1em;" width="100%">
                        @if($val->free==1)
                        <span style="top:5px;right:5px;">Free Gift</span>
                        @endif
                        </div>
                        <div class="monthly_price">
                            <h2 class="price" style="color: {{$set->s_c}};">{{$currency->symbol.number_format($val->min_deposit)}}</h2>
                            <p style="color: {{$set->s_c}};">${{number_format($val->min_deposit)}}</p>
                        </div>
                        <div class="small_desc text-center">
                            <span style="color:white;" class="castrooo">{{__('Locked For')}} {{$val->duration}} {{$val->period}}(s)</span><br>
                            <span style="color:white;" class="castrooo">{{$val->percent}}% {{__('Yield')}}</span><br>
                            <span style="color:white;" class="castrooo">{{$currency->symbol.number_format($val->amount)}} {{__('Max limit')}}</span><br>
                            @if($val->ref_percent!=null)
                            <span style="color:white;" class="castrooo">{{$val->ref_percent}}% {{__('Referral Percent')}}</span><br>
                            @endif
                            @if($val->bonus!=null)
                            <span style="color:white;" class="castrooo">{{$val->bonus}}% {{__('Trading Bonus')}}</span><br>
                            @endif
                        </div>
                        <a class="btn btn-sm btn-soft-primary2 btn-pill" href="{{route('register')}}">{{__('Get It Now')}}<i class="fas fa-angle-right ml-1"></i></a>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop
