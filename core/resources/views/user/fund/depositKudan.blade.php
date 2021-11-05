
@extends('userlayout')

@section('content')
<div class="container-fluid mt--6">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-8">
        <div class="card" >
          <div class="card-header">
            <h3 class="mb-0 text-dark">{{__('Deposit Kudan')}}</h3>
          </div>
          <div class="card-body">
          <form method="post" action="{{route('deposit_kudansubmit')}}" enctype="multipart/form-data">
          @csrf
          <!-- <div class="form-group row"> -->
             <!-- <label class="col-form-label col-lg-3">{{__('Wallet Address')}}</label> -->
             <!-- <div class="col-lg-9">
               <div class="input-group"> -->
               <input type="text" name="wallet" id="wallet" class="form-control" hidden>
                 <!-- </div>
               </div> -->
           <!-- </div> -->
           <div class="form-group row">
              <label class="col-form-label col-lg-3">{{__('Deposit Amount Kudan')}}</label>
              <div class="col-lg-9">
                <div class="input-group">
                  <!-- <span class="input-group-prepend">
                    <span class="input-group-text">{{$currency->symbol}}</span>
                  </span> -->
                <input type="number" step="any" name="amount" max-length="10" class="form-control">
                  </div>
                </div>
            </div>


            <!-- <div class="form-group row">
              <label class="col-form-label col-lg-3">{{__('Transfer Notes')}}</label>
              <div class="col-lg-9">
                  <textarea type="text" class="form-control" rows="5" placeholder="{{__('Transaction Details')}}" name="details" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-lg-3">{{__('Proof of Payment')}}</label>
              <div class="col-lg-9">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFileLang" name="image" lang="en">
                  <label class="custom-file-label" for="customFileLang" style="border-color: {{$set->s_c}};">{{__('Choose Screenshot')}}</label>
                </div>
              </div>
            </div> -->
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
                <h3 class="card-title mb-3 text-dark">{{__('Bank Details')}}</h3>
                <ul class="list list-unstyled mb-0 card-text text-sm text-dark">
                  <li>{{__('Name')}}: {{$bank->name}}</li>
                  <li>{{__('Bank')}}: {{$bank->bank_name}}</li>
                  <li>{{__('Address')}}: {{$bank->address}}</li>
                  <li>{{__('Swift Code')}}: {{$bank->swift}}</li>
                  <li>{{__('Iban Code')}}: {{$bank->iban}}</li>
                  <li>{{__('Account Number')}}: {{$bank->acct_no}}</li>
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
<script type="text/javascript">
window.addEventListener('load', async () => {
  if (window.ethereum) {
    window.web3 = new Web3(ethereum);
    try {
      await ethereum.enable();
      // Take wallet from Metamask
      var bscacc = ethereum.selectedAddress;
      $( "#connectMetamask" ).click(function() {
        document.getElementById("wallet").setAttribute('value',bscacc);
      });
    } catch (err) {
      $('.pay-button').html('User denied account access', err)
      $('.pay-button').attr("disabled", true);
    }
  } else if (window.web3) {
    window.web3 = new Web3(web3.currentProvider)
  } else {
    $('.pay-button').html('No Metamask installed')
    $('.pay-button').attr("disabled", true);
  }
})
</script>
