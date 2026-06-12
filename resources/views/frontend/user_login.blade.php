@extends('frontend.layouts.app')

@section('content')
<div class="py-4 py-lg-5 eb-pm-bg">
     
    <div class="container ">
        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-md-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5 text-center">
                            <h1 class="h3 text-primary mb-0">{{ translate('Login to your account') }}</h1>
                        </div>

                        <form class="" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            
                            <input type="hidden" name="login_with" id="login_with" value="{{ old('login_with', 'email') }}">

                            <div class="text-center mb-4">
                                <ul class="nav nav-tabs login-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link @if(old('login_with', 'email') == 'email') active @endif" id="email-login-tab" data-toggle="tab" href="#email-login-pane" role="tab" aria-controls="email-login-pane" aria-selected="@if(old('login_with', 'email') == 'email') true @else false @endif" style="font-size: 14px; border-radius: 20px; padding: 6px 20px;">{{ translate('Email') }}</a>
                                    </li>
                                    <li class="nav-item ml-2">
                                        <a class="nav-link @if(old('login_with') == 'phone') active @endif" id="phone-login-tab" data-toggle="tab" href="#phone-login-pane" role="tab" aria-controls="phone-login-pane" aria-selected="@if(old('login_with') == 'phone') true @else false @endif" style="font-size: 14px; border-radius: 20px; padding: 6px 20px;">{{ translate('Phone') }}</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content mb-3">
                                <!-- Email Tab -->
                                <div class="tab-pane fade @if(old('login_with', 'email') == 'email') show active @endif" id="email-login-pane" role="tabpanel" aria-labelledby="email-login-tab">
                                    <div class="form-group">
                                        <label class="form-label" for="email">{{ translate('Email Address') }}</label>
                                        <input type="text" class="form-control {{ $errors->has('email') || $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('login_with', 'email') == 'email' ? old('email') : '' }}" placeholder="{{ translate('Email') }}" name="email" id="email">
                                        @if ($errors->has('email') || $errors->has('phone'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('email') ?: $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Phone Tab -->
                                <div class="tab-pane fade @if(old('login_with') == 'phone') show active @endif" id="phone-login-pane" role="tabpanel" aria-labelledby="phone-login-tab">
                                    <div class="form-group mb-1">
                                        <label class="form-label" for="phone-code">{{ translate('Phone Number') }}</label>
                                        <div class="phone-form-group">
                                            <input type="tel" id="phone-code" class="form-control {{ $errors->has('phone') || $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('login_with') == 'phone' ? old('phone') : '' }}" name="phone" placeholder="" autocomplete="off">
                                        </div>
                                        <input type="hidden" name="country_code" value="{{ old('country_code') }}">
                                        @if ($errors->has('phone') || $errors->has('email'))
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $errors->first('phone') ?: $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                             <div class="form-group">
                                 <label class="form-label" for="password">{{ translate('Password') }}</label>
                                 <div class="input-group">
                                     <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="********" required>
                                     <div class="input-group-append">
                                         <span class="input-group-text toggle-password" style="cursor: pointer;">
                                             <i class="las la-eye-slash"></i>
                                         </span>
                                     </div>
                                 </div>
                                 @error('password')
                                     <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                 @enderror
                             </div>

                            <div class="mb-3 text-right">
                                <a class="link-muted text-capitalize font-weight-normal" href="{{ route('password.request') }}">{{ translate('Forgot Password?') }}</a>
                            </div>

                            <div class="mb-5">
                                <button type="submit" class="btn btn-block btn-primary">{{ translate('Login to your Account') }}</button>
                            </div>
                        </form>
                        @if (env("DEMO_MODE") == "On")
                            <div class="mb-5">
                                <table class="table table-bordered table-responsive">
                                    <tbody>
                                        <tr>
                                            <td>user2@example.com</td>
                                            <td>12345678</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-primary btn-xs" onclick="autoFill1()">{{ translate('Copy credentials') }}</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>user17@example.com</td>
                                            <td>12345678</td>
                                            <td class="text-center">
                                                <button class="btn btn-outline-primary btn-xs" onclick="autoFill2()">{{ translate('Copy credentials') }}</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif

                        @if(get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1 || get_setting('apple_login_activation') == 1)
                            <div class="separator mb-3">
                                <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                            </div>
                            <ul class="list-inline social colored text-center mb-5">
                                @if (get_setting('facebook_login_activation') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="facebook">
                                            <i class="lab la-facebook-f"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(get_setting('google_login_activation') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'google']) }}" class="google">
                                            <i class="lab la-google"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('twitter_login_activation') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'twitter']) }}" class="twitter">
                                            <i class="lab la-twitter"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (get_setting('apple_login_activation') == 1)
                                    <li class="list-inline-item">
                                        <a href="{{ route('social.login', ['provider' => 'apple']) }}" class="apple">
                                            <i class="lab la-apple"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        <div class="text-center">
                            <p class="text-muted mb-0">{{ translate("Don't have an account?") }}</p>
                            <a href="{{ route('register') }}">{{ translate('Create an account') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
     .eb-pm-bg{
          background:url("public/assets/img/bg.png")no-repeat top center;
          background-size:cover;
          background-attachment:fixed;
       }
     .login-tabs {
          background: #f8f9fa;
          border-radius: 30px;
          padding: 4px;
          display: inline-flex;
          margin: 0 auto;
          border: 1px solid #e9ecef !important;
     }
     .login-tabs .nav-link {
          border: none !important;
          color: #495057;
          background: transparent;
          transition: all 0.3s ease;
     }
     .login-tabs .nav-link.active {
          background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
          color: #fff !important;
          box-shadow: 0 4px 10px rgba(253, 44, 121, 0.2);
     }
     </style>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        // Toggle password visibility
        $('.toggle-password').on('click', function() {
            var input = $(this).closest('.input-group').find('input');
            var icon = $(this).find('i');
            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('la-eye-slash').addClass('la-eye');
            } else {
                input.attr('type', 'password');
                icon.removeClass('la-eye').addClass('la-eye-slash');
            }
        });

        // Initialize intl-tel-input
        var countryData = window.intlTelInputGlobals.getCountryData(),
            input = document.querySelector("#phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var iti = intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "us";
                    callback(countryCode);
                });
            },
            separateDialCode: true,
            utilsScript: "{{ static_asset('assets/js/intlTelutils.js') }}?1590403638580",
            onlyCountries: @php echo json_encode(\App\Models\Country::where('status', 1)->pluck('code')->toArray()) @endphp,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                if (selectedCountryData.iso2 == 'bd') {
                    return "01xxxxxxxxx";
                }
                return selectedCountryPlaceholder;
            }
        });

        var country = iti.getSelectedCountryData();
        $(input).closest('form').find('input[name=country_code]').val(country.dialCode);

        input.addEventListener("countrychange", function(e) {
            var country = iti.getSelectedCountryData();
            $(input).closest('form').find('input[name=country_code]').val(country.dialCode);
        });

        // Toggle login field state
        function toggleRequired(tabId) {
            if (tabId === '#email-login-pane') {
                $('#login_with').val('email');
            } else {
                $('#login_with').val('phone');
            }
        }

        // On tab switch
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var targetPane = $(e.target).attr("href");
            toggleRequired(targetPane);
        });

        // Initialize state on load
        var activeTab = $('#login_with').val();
        if (activeTab === 'phone') {
            $('#phone-login-tab').tab('show');
            toggleRequired('#phone-login-pane');
        } else {
            $('#email-login-tab').tab('show');
            toggleRequired('#email-login-pane');
        }

        // Hook Autofill function for demo compatibility
        var originalAutoFill1 = window.autoFill1;
        window.autoFill1 = function() {
            $('#email-login-tab').tab('show');
            if (typeof originalAutoFill1 === 'function') {
                originalAutoFill1();
            } else {
                $('#email').val('user2@example.com');
                $('#password').val('12345678');
            }
        };

        var originalAutoFill2 = window.autoFill2;
        window.autoFill2 = function() {
            $('#email-login-tab').tab('show');
            if (typeof originalAutoFill2 === 'function') {
                originalAutoFill2();
            } else {
                $('#email').val('user17@example.com');
                $('#password').val('12345678');
            }
        };
    });
</script>
@endsection