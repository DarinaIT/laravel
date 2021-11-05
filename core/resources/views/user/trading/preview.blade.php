@extends('loginlayout')

@section('content')

<div class="main-content">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-1">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 mb-0">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card card-profile border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center">
                <h3 class="text-dark">{{$title}}</h3>
                  @php
                      $interest=$currency->symbol.$amount*$plan->interest/100;
                      $compound=$currency->symbol.$amount*$plan->compound/100;
                  @endphp
                <span class="mt-0 mb-5 text-sm">{{__('Name')}}:{{$plan->name}}</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Duration')}}:{{$plan->duration.' '.$plan->period}}(s)</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Amount')}}:{{$currency->symbol.number_format($amount)}}</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Interest')}}:{{$interest}}</span><br>
                <span class="mt-0 mb-5 text-sm">{{__('Compound Interest')}}:{{$compound}}</span>
                  @if(isset($coupon))
                    <hr>
                    <span class="mt-0 mb-5 text-sm">{{__('Coupon code')}}:{{$coupon->code}}</span><br>
                    <span class="mt-0 mb-5 text-sm">{{__('Percent off')}}:{{$coupon->percent}}%</span><br>
                    <span class="mt-0 mb-5 text-sm">{{__('Total')}}:{{$currency->symbol}}{{$amount-($amount*$coupon->percent/100)}}</span>
                    <form action="{{url('user/buy')}}" method="post">
                        @csrf
                        <br>
                        <input type="hidden" name="coupon" value="1">
                        <input type="hidden" name="code" value="{{$coupon->code}}">
                        <input type="hidden" name="amount" value="{{$amount}}">
                        <input type="hidden" name="plan" value="{{$plan->id}}">
                        <button type="submit" class="btn btn-neutral btn-block">{{__('Confirm')}}</button>
                    </form>
                  @else
                    <form action="{{url('user/buy')}}" method="post">
                      @csrf
                      <br>
                      <input type="hidden" name="coupon" value="0">
                      <input type="hidden" name="code" value="">
                      <input type="hidden" name="amount" value="{{$amount}}">
                      <input type="hidden" name="plan" value="{{$plan->id}}">
                      <button type="submit" class="btn btn-neutral btn-block">{{__('Confirm')}}</button>
                    </form>
                  @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
