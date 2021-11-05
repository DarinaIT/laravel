<!doctype html>
  <html class="no-js" lang="en">
    <head>
      <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
      <meta http-equiv="Pragma" content="no-cache" />
      <meta http-equiv="Expires" content="0" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <base href="{{url('/')}}"/>
        <title>{{ $title }} | {{$set->site_name}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="robots" content="index, follow">
        <meta name="apple-mobile-web-app-title" content="{{$set->site_name}}"/>
        <meta name="application-name" content="{{$set->site_name}}"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta name="description" content="{{$set->site_desc}}" />
        <link rel="shortcut icon" href="{{url('/')}}/asset/{{$logo->image_link2}}" />
        <link rel="stylesheet" href="{{url('/')}}/asset/css/sweetalert.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('/')}}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/asset/css/toast.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.css">
        <link href="{{url('/')}}/asset/fonts/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/asset/fonts/fontawesome/css/all.css" rel="stylesheet" type="text/css">
        <!-- ADD METAMASK -->
        <script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.34/dist/web3.js"></script>

         @yield('css')
    </head>
  <body>
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" style="background-color:{{$set->m_c}};" id="sidenav-main">
      <div class="scrollbar-inner">
        <div class="sidenav-header d-flex align-items-center">
          <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('/')}}/asset/{{$logo->image_link}}" class="navbar-brand-img" alt="...">
          </a>
          <div class="ml-auto">
            <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line" style="background-color: {{$set->s_c}};"></i>
                <i class="sidenav-toggler-line" style="background-color: {{$set->s_c}};"></i>
                <i class="sidenav-toggler-line" style="background-color: {{$set->s_c}};"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar-inner">
          <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link @if(route('user.dashboard')==url()->current()) active @endif text-light" href="{{route('user.dashboard')}}">
                  <i class="fad fa-house-user" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Overview')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.plans')==url()->current()) active @endif text-light" href="{{route('user.plans')}}">
                  <i class="fad fa-spa" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Buy')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.fund')==url()->current()) active @endif text-light" href="{{route('user.fund')}}">
                  <i class="fad fa-money-bill-wave-alt" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Deposit')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.withdraw')==url()->current()) active @endif text-light" href="{{route('user.withdraw')}}">
                  <i class="fad fa-calendar" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Withdraw')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a style="pointer-events: none; display: inline-block;" class="nav-link text-light" href="#">
                  <i class="fad fa-exchange" style="color: {{$set->s_c}};"></i>
                  <span style="color:#7a7a7a !important" class="nav-link-text">{{__('Swap (coming soon)')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a style="pointer-events: none; display: inline-block;" class="nav-link text-light" href="#">
                  <i class="fad fa-rocket" style="color: {{$set->s_c}};"></i>
                  <span style="color:#7a7a7a !important" class="nav-link-text">{{__('DeX (coming soon)')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.trades')==url()->current()) active @endif text-light" href="{{route('user.trades')}}">
                  <i class="fad fa-sync" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Activity')}}</span>
                </a>
              </li>
              @if($set->transfer==1)
              <li class="nav-item">
                <a class="nav-link @if(route('user.ownbank')==url()->current()) active @endif text-light" href="{{route('user.ownbank')}}">
                  <i class="fad fa-share" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Send Coins')}}</span>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link @if(route('user.ticket')==url()->current()) active @endif text-light" href="{{route('user.ticket')}}">
                  <i class="fad fa-user-headset" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Disputes')}}</span>
                </a>
              </li>
              @if($set->referral==1)
              <li class="nav-item">
                <a class="nav-link @if(route('user.referral')==url()->current()) active @endif text-light" href="{{route('user.referral')}}">
                  <i class="fad fa-user" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Referral')}}</span>
                </a>
              </li>
              @endif
            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading p-0 text-muted">{{__('More')}}</h6>
            <ul class="navbar-nav mb-md-3">
              <li class="nav-item">
                <a class="nav-link @if(route('user.profile')==url()->current()) active @endif text-light" href="{{route('user.profile')}}">
                  <i class="fad fa-cogs" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Settings')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.audit')==url()->current()) active @endif text-light" href="{{route('user.audit')}}">
                  <i class="fad fa-sync" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Audit Logs')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.password')==url()->current()) active @endif text-light" href="{{route('user.password')}}">
                  <i class="fad fa-low-vision" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Password & Devices')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.2fa')==url()->current()) active @endif text-light" href="{{route('user.2fa')}}">
                  <i class="fad fa-unlock-alt" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('2FA Security')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link @if(route('user.kyc')==url()->current()) active @endif text-light" href="{{route('user.kyc')}}">
                  <i class="fad fa-file-alt" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('KYC')}}</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="{{route('user.logout')}}">
                  <i class="fad fa-sign-out" style="color: {{$set->s_c}};"></i>
                  <span class="nav-link-text">{{__('Sign out')}}</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="main-content" id="panel">
      <nav class="navbar navbar-top navbar-expand navbar-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center ml-md-auto">
              <li class="nav-item d-xl-none">
                <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </div>
              </li>
            </ul>
            <div class="">
              <h6 class="h2 mb-0" style="color: {{$set->s_c}};">
                  {{$currency->symbol.number_format($user->balance)}}
              </h6>
              <p>USD ${{number_format($user->balance/1.00)}}</p>
            </div>
            @if($set->language==1)
            <ul class="navbar-nav align-items-center ">
              <li class="nav-item dropdown">
              @php $locale = session()->get('locale'); @endphp
                <a class="nav-link pr-0"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <div class="media-body ml-2 d-lg-block">
                      @switch($locale)
                        @case('fr')
                        <span class="mb-0 text-sm"><span class="france"></span>French</span>
                        @break
                        @case('ge')
                        <span class="mb-0 text-sm"><span class="germany"></span>German</span>
                        @break
                        @case('es')
                        <span class="mb-0 text-sm"><span class="spain"></span>Spanish</span>
                        @break
                        @case('in')
                        <span class="mb-0 text-sm"><span class="hindi"></span>Hindi</span>
                        @break
                        @case('ch')
                        <span class="mb-0 text-sm"><span class="china"></span>China</span>
                        @break
                        @default
                        <span class="mb-0 text-sm"><span class="usa"></span>English</span>
                      @endswitch
                    </div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right text-left">
                  <a href="{{url('/')}}/lang/en" class="dropdown-item">
                    <span  class="mb-0 text-sm"><span class="usa"></span>English</span>
                  </a>
                  <a href="{{url('/')}}/lang/fr" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="france"></span>France</span>
                  </a>
                  <a href="{{url('/')}}/lang/ge" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="germany"></span>Germany</span>
                  </a>
                  <a href="{{url('/')}}/lang/ch" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="china"></span>China</span>
                  </a>
                  <a href="{{url('/')}}/lang/in" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="hindi"></span>Hindi</span>
                  </a>
                  <a href="{{url('/')}}/lang/es" class="dropdown-item">
                    <span class="mb-0 text-sm"><span class="spain"></span>Spanish</span>
                  </a>
                </div>
              </li>
            </ul>
            @endif
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link pr-0" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                      <img alt="Image placeholder" src="{{url('/')}}/asset/profile/{{$cast}}">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                      <span class="mb-0 text-sm text-default">{{$user->first_name}} {{$user->last_name}}</span>
                    </div>
                  </div>

                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.logout')}}" class="nav-link pr-0">
                  <i class="fad fa-sign-out" style="color: {{$set->s_c}};"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="header pb-6">
        <div class="container-fluid">
          <div class="header-body">
          </div>
        </div>
      </div>
        @yield('content')

      </div>
    </div>
    {!!$set->livechat!!}
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/quill/dist/quill.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/dropzone/dist/min/dropzone.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="{{url('/')}}/asset/dashboard/js/argon.js?v=1.1.0"></script>
    <script src="{{url('/')}}/asset/dashboard/js/demo.min.js"></script>
    <script src="{{url('/')}}/asset/js/toast.js"></script>
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
  </body>
</html>
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
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [<?php foreach($history as $val){ echo "'".date("M j",strtotime($val->updated_at))."'".','; }?>],
          datasets: [{
              label: 'Received',
              data: [<?php foreach($history as $val){ echo $val->amount.','; }?>],
              backgroundColor: [
                  'transparent'
              ],
              borderColor: [
                  '{{$set->s_c}}'
              ],
              borderWidth: 1,
              pointBorderColor: 'rgba(0, 0, 0, 0.1)',
              pointBorderWidth:1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  display: true,
                  ticks: {
                      beginAtZero: true,
                      fontColor: '#32325d'
                  }
              }],
              xAxes: [{
                  ticks: {
                      fontColor: '#32325d'
                  }
              }]
          },
        tooltips: {
          enabled:true,
          backgroundColor:'rgba(0, 0, 0, 0.8)'
        }
      }
    });
</script>
@foreach($xplan as $vplan)
<script>
'use strict';
var noUiSlider@php echo $vplan->id; @endphp = (function() {
	$('.input-slider-container{{$vplan->id}}').each(function() {
    var cur = '{{$currency->symbol}}';
    var bonus@php echo $vplan->id; @endphp = '{{$vplan->bonus}}/100';
		var c@php echo $vplan->id; @endphp = document.getElementById($(this).find('.source{{$vplan->id}}').attr('id'));
		var d@php echo $vplan->id; @endphp = document.getElementById($(this).find('.view{{$vplan->id}}').attr('id'));

		var xslider@php echo $vplan->id; @endphp = noUiSlider.create(c@php echo $vplan->id; @endphp, {
			start: [parseInt($(this).find('.view{{$vplan->id}}').data('range-value-low'))],
			connect: [true, false],
			range: {'min': [parseInt($(this).find('.source{{$vplan->id}}').data('range-value-min'))],'max': [parseInt($(this).find('.source{{$vplan->id}}').data('range-value-max'))]}
    });

    $("#sliderValueInput{{$vplan->id}}").val(xslider@php echo $vplan->id; @endphp.get());
			var xanswer@php echo $vplan->id; @endphp =parseFloat(xslider@php echo $vplan->id; @endphp.get())*parseInt($("#duration{{$vplan->id}}").val())/100;
      var xcompound@php echo $vplan->id; @endphp =parseFloat(xanswer@php echo $vplan->id; @endphp.toFixed(2))*parseFloat(bonus@php echo $vplan->id; @endphp)/100;
    $("#profit{{$vplan->id}}").text(cur+' '+xanswer@php echo $vplan->id; @endphp.toFixed(2));
    $("#bonus{{$vplan->id}}").text('+'+cur+' '+xcompound@php echo $vplan->id; @endphp.toFixed(2)+' bonus');
    $("#input-slider-value{{$vplan->id}}").text(cur+' '+parseFloat(xslider@php echo $vplan->id; @endphp.get(1)).toFixed());

		xslider@php echo $vplan->id; @endphp.on("change", function() {
      var answer@php echo $vplan->id; @endphp =parseFloat(xslider@php echo $vplan->id; @endphp.get())*parseInt($("#duration{{$vplan->id}}").val())/100;
      var compound@php echo $vplan->id; @endphp =parseFloat(answer@php echo $vplan->id; @endphp.toFixed(2))*parseFloat(bonus@php echo $vplan->id; @endphp)/100;
      $("#profit{{$vplan->id}}").text(cur+' '+answer@php echo $vplan->id; @endphp.toFixed(2));
      $("#bonus{{$vplan->id}}").text('+'+cur+' '+compound@php echo $vplan->id; @endphp.toFixed(2)+' bonus');
			$("#sliderValueInput{{$vplan->id}}").val(xslider@php echo $vplan->id; @endphp.get());
      $("#input-slider-value{{$vplan->id}}").text(cur+' '+parseFloat(xslider@php echo $vplan->id; @endphp.get(1)).toFixed());
		});
	})
})();
</script>
@endforeach
@if($set->recaptcha==1)
  {!! NoCaptcha::renderJs() !!}
@endif
