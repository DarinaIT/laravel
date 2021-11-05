@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      @if(count($plan)>0)
        @foreach($plan as $val)
          <div class="col-lg-4"> 
            <div class="pricing card-group flex-column flex-md-row mb-3">
              <div class="card card-pricing border-0 text-center mb-2 @if($val->popular==1) bg-progress @endif">
                <div class="card-header bg-transparent">
                </div>
                <div class="card-body px-lg-7">
                  <h2 class="card-title mb-0 @if($val->popular==1) text-white @endif" @if($val->popular==1)title="Most popular" @endif>{{$val->name}} @if($val->popular==1) <i class="fad fa-star"></i> @endif</h2>
                  <div class="text-xl mb-2 @if($val->popular==1) text-white @else text-dark @endif">{{number_format($val->min_deposit).$currency->name}} <span class="text-sm @if($val->popular==1) text-white @else text-dark @endif">@ {{$val->percent}}% {{__('Daily')}}</span></div>
                  <p class="card-text text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">Runs for {{$val->duration}} {{$val->period}}@if($val->duration>1)s @endif</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">{{number_format($val->amount).$currency->name}} {{__('Maximum Deposit')}}</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">{{$val->interest}}% {{__('Return on Investment')}}</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">@if($val->ref_percent!=null){{$val->ref_percent}}% @else {{__('No')}} @endif{{__('Referral Bonus')}}</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">@if($val->bonus!=null){{$val->bonus}}% @else {{__('No')}} @endif{{__('Investment Bonus')}}</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">@if($val->claim==1) {{__('Access to Profit anytime')}} @else {{__('Access to profit at end of plan')}} @endif</p>
                  <p class="text-sm @if($val->popular==1) text-white @else text-dark @endif mb-0">@if($val->recurring==1) {{__('Recurring capital investment')}} @else {{__('No recurring capital investment')}} @endif</p>
                  <br>
                  <a href="#" data-toggle="modal" data-target="#buy{{$val->id}}"  class="btn btn-block @if($val->popular==1) btn-white @else btn-neutral @endif"><i class="fad fa-shopping-cart"></i> {{__('Purchase Plan')}}</a>
                  <hr>
                  @php
                  $amount=$val->min_deposit;
                  $interest=($val->min_deposit*$val->interest/100).$currency->name;
                  $compound=$val->min_deposit*($val->compound/100).$currency->name;
                  $xstart_date=date_create(Carbon\Carbon::now());
                  date_add($xstart_date, date_interval_create_from_date_string($val->duration.' '.$val->period));
                  $xndate=date_format($xstart_date, "Y-m-d H:i:s");
                  @endphp
                  <div class="row align-items-center">
                    <div class="modal fade" id="buy{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-body p-0">
                            <div class="card border-0 mb-0">
                              <div class="card-header bg-transparent pb-5">
                                <div class="text-dark text-center mt-2 mb-3"><small>{{$val->name}}</small></div>
                                <div class="btn-wrapper text-center">
                                  <h1 class="text-uppercase text-future py-1 mb-0" id="profit{{$val->id}}">{{$val->name}}</h1>
                                  @if($val->bonus!=null)
                                    <p class="text-sm text-future mb-0" id="bonus{{$val->id}}"></p>
                                  @endif
                                    <p class="text-sm text-future mb-0">End by {{date("Y/m/d h:i:A", strtotime($xndate))}}</p>
                                </div>
                              </div>
                              <div class="card-body">
                                <form role="form" action="{{route('user.check_plan')}}" method="post">
                                @csrf
                                  <input type="hidden" name="plan" value="{{$val->id}}">
                                  <div class="form-group mb-3">
                                    <div class="input-slider-container{{$val->id}}">
                                      <div class="row mt-3">
                                        <div class="col-12 text-left">
                                          <input id="sliderValueInput{{$val->id}}" name="amount" type="hidden">
                                          <input id="duration{{$val->id}}" value="{{$val->compound}}" type="hidden">
                                          <input id="percent{{$val->id}}" value="{{$val->percent}}" type="hidden">
                                          <span id="input-slider-value{{$val->id}}" class="range-slider-value view{{$val->id}}" data-range-value-low="{{$val->min_deposit}}"></span>
                                        </div>
                                      </div>
                                      <div id="input-slider{{$val->id}}" class="input-slider source{{$val->id}}" data-range-value-min="{{$val->min_deposit}}" data-range-value-max="{{$val->amount}}"></div>
                                    </div>
                                  </div>
                                  <div class="form-group mb-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">#</span>
                                      </div>
                                      <input type="text" class="form-control" placeholder="{{__('Coupon code Optional')}}" maxlength="8" name="coupon">
                                    </div>
                                  </div>
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-neutral btn-block my-4">{{__('Purchase')}}</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="card-text text-xs @if($val->popular==1) text-white @else text-gray @endif">{{__('Here a quick summary; Money invested')}} {{$amount.$currency->name}}, {{__('ROI will be')}} {{$interest}}, {{__('Compound Interest will amount to')}}
                  {{$compound}} {{__('after')}} {{$val->duration.' '.$val->period}}@if($val->duration>1)s @endif. @if($val->bonus!==null) {{__('You will receive')}} {{$val->bonus}}% {{__('of Compound Interest as Bonus')}} @endif
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="col-md-12 mb-5">
          <div class="text-center mt-8">
            <div class="mb-3">
              <img src="{{url('/')}}/asset/images/empty.svg">
            </div>
            <h3 class="text-dark">No Plans</h3>
            <p class="text-dark text-sm card-text">We couldn't find any investment plans</p>
          </div>
        </div>
      @endif
    </div>
    <div class="row">
      <div class="col-md-12">
      {{ $plan->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
@stop
