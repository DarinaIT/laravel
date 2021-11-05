@extends('loginlayout')

@section('content')
  <div class="main-content">
    <div class="header py-7 py-lg-3 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">

          </div>
        </div>
      </div>
    </div>
    <div class="container mt--8 pb-2">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card border-0 mb-0">
            <div class="card-header bg-transparent pb-3">
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-dark mb-5">
                <h3 class="text-dark font-weight-bolder">{{ __('KYC VERIFICATION') }}</h3>
                <small>{{ __('Ensure document provided contains thesame information as of registration') }}</small>
              </div>
              <form role="form" action="{{route('user.upload-kyc')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <select class="form-control select" @if($user->kyc_link!=null && $user->kyc_status==0 || $user->kyc_link!=null && $user->kyc_status==1) disabled @endif name="type" required>
                        <option value="">{{__('Identification type')}}</option>
                        <option value="National ID" @if($user->kyc_type=='National ID') selected @endif>{{__('National ID')}}</option>
                        <option value="Driver license" @if($user->kyc_type=='Driver license') selected @endif>{{__('Driver license')}}</option>
                        <option value="Voters card" @if($user->kyc_type=='Voters card') selected @endif>{{__('Voters card')}}</option>
                    </select>
                </div> 
                @if($user->kyc_link==null && $user->kyc_status==0)
                    <div class="text-center">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" name="image" accept="image/*">
                                <label class="custom-file-label" for="customFileLang" style="border-color: {{$set->s_c}};">{{__('Select document')}}</label>
                            </div> 
                        </div> 
                        @if ($errors->has('image'))
                            <span class="error form-error-msg ">
                            <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif 
                    </div>
                @endif  
                <div class="text-center">
                    @if($user->kyc_link==null && $user->kyc_status==0)
                        <button type="submit" class="btn btn-neutral btn-block my-4 text-uppercase">{{__('Upload')}}</button>
                    @endif
                    <div class="loginSignUpSeparator"><span class="textInSeparator text-sm text-uppercase">Status</span></div>
                    @if($user->kyc_link!=null && $user->kyc_status==0)
                      <span class="error form-error-msg ">
                        <span class="badge badge-pill badge-primary mb-3">{{__('Under review')}}</span>
                      </span>                    
                    @elseif($user->kyc_link!=null && $user->kyc_status==1)
                      <span class="error form-error-msg ">
                        <span class="badge badge-pill badge-success mb-3">{{__('Approved')}}</span>
                      </span>
                    @endif
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@stop