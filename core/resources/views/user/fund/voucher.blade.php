
@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card" >
          <div class="card-header">
            <h1 class="mb-0 text-dark">{{__('Deposit voucher')}}</h1>
            <p>It can take us up to 24h to approve your deposit request.</p>
          </div>
          <div class="card-body">
          <form method="post" action="{{route('bank_transfersubmit')}}" enctype="multipart/form-data">
          @csrf
           <div class="form-group row">
              <label class="col-form-label col-lg-3">{{__('Voucher Amount')}}</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <span class="input-group-text">{{$currency->symbol}} (1 BTBUSD = 1 USD)</span>
                  </span>
                <input style="border-color: {{$set->s_c}};" type="number" step="any" name="amount" max-length="10" class="form-control" required>
                  </div>
                </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-lg-3">{{__('Voucher code')}}</label>
              <div class="col-lg-9">
                  <textarea style="border-color: {{$set->s_c}};" type="text" class="form-control" rows="1" placeholder="{{__('Voucher code')}}" name="details" required></textarea>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
            <div class="text-right">
                <button type="submit" class="btn btn-success btn-sm">{{__('Proceed')}}</button>
            </div>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card" >
          <div class="card-body text-center">
            <div class="">
              <div>
                <h3 class="card-title mb-3 text-dark">{{__('Buy voucher')}}</h3>
                <ul class="list list-unstyled mb-0 card-text text-sm text-dark">
                  <li><a class="btn btn-sm btn-success" href="https://booll.com/" target="_blank" target="_blank">Buy voucher</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>
@stop
