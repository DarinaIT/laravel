
@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card" >
          <div class="card-header">
            <h3 class="mb-0 text-dark">{{__('Transfer')}}</h3>
          </div>
          <div class="card-body">
            <form id="loggedUserInfoForm" method="post">
              <input type="hidden" name="id" id="id" value="" readonly required />
              First name:
              <input type="text" name="fname" id="fname" value="" class="form-control" required /><br>
              Last name:
              <input type="text" name="lname" id="lname" value="" class="form-control"required /><br>
              Email address:
              <input type="email" name="email" id="email" value="" class="form-control" required /><br>
              Phone number:
              <input type="text" name="phone" id="phone" value="" class="form-control" required /><br>

              Amount to invest:
              <input type="range" name="rangeInput" min="500" max="1000" onchange="updateTextInput(this.value);">
              <input type="text" id="investment" name="investment" value="767" class="form-control" readonly required><br>

              Agree with terms of sale:
              <input type="checkbox" id="sales_agreement" name="sales_agreement" value="1" ><br>

              <input type="submit" name="loginBtn" id="loginBtn" value="Save" class="btn btn-success btn-sm" />
              <button type="button" class="pay-button btn btn-success btn-sm">Pay</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>
    <script src="../testbitbooll/core/public/depositBTBjs.js"></script>
@stop
