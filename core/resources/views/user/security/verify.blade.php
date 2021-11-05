@extends('loginlayout')

@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="header py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-dark mb-0">
                {{__('Email verification')}}
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5 mb-0">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">

          <div class="card card-profile bg-white border-0 mb-5">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <img src="{{url('/')}}/asset/profile/{{$cast}}" class="rounded-circle border-secondary">
                </div>
              </div>
            </div>
            <div class="card-body pt-7 px-5">
              <div class="text-center text-dark mb-5">
                <small>{{__('Verify your Email')}}, <span class="text-muted"><a href="{{route('user.resend.email')}}">{{__('Resend email')}}</a></span></small>
              </div>
              <form role="form" action="{{ route('send.email-verify')}}" method="post">
                @csrf
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fad fa-unlock"></i></span>
                    </div>
                    <input type="hidden"  name="id" value="{{Auth::guard('user')->user()->id}}">
                    <input class="form-control" placeholder="{{ __('Code') }}" type="text" name="email_code" required>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-neutral btn-block my-4">{{__('Verify')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop