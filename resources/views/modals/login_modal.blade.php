<div class="modal fade" id="LoginModal">
    <div class="modal-dialog modal-dialog-zoom">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title fw-600">{{ translate('Login')}}</h6>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="p-3">
                    <form class="" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                        <input type="hidden" name="login_with" id="modal_login_with" value="{{ old('login_with', 'email') }}">

                        <div class="text-center mb-4">
                            <ul class="nav nav-tabs login-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link @if(old('login_with', 'email') == 'email') active @endif" id="modal-email-login-tab" data-toggle="tab" href="#modal-email-login-pane" role="tab" aria-controls="modal-email-login-pane" aria-selected="@if(old('login_with', 'email') == 'email') true @else false @endif" style="font-size: 14px; border-radius: 20px; padding: 6px 20px;">{{ translate('Email') }}</a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a class="nav-link @if(old('login_with') == 'phone') active @endif" id="modal-phone-login-tab" data-toggle="tab" href="#modal-phone-login-pane" role="tab" aria-controls="modal-phone-login-pane" aria-selected="@if(old('login_with') == 'phone') true @else false @endif" style="font-size: 14px; border-radius: 20px; padding: 6px 20px;">{{ translate('Phone') }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content mb-3">
                            <!-- Email Tab -->
                            <div class="tab-pane fade @if(old('login_with', 'email') == 'email') show active @endif" id="modal-email-login-pane" role="tabpanel" aria-labelledby="modal-email-login-tab">
                                <div class="form-group">
                                    <label class="form-label" for="modal-email">{{ translate('Email Address') }}</label>
                                    <input type="text" class="form-control {{ $errors->has('email') || $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('login_with', 'email') == 'email' ? old('email') : '' }}" placeholder="{{ translate('Email') }}" name="email" id="modal-email">
                                    @if ($errors->has('email') || $errors->has('phone'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('email') ?: $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Phone Tab -->
                            <div class="tab-pane fade @if(old('login_with') == 'phone') show active @endif" id="modal-phone-login-pane" role="tabpanel" aria-labelledby="modal-phone-login-tab">
                                <div class="form-group mb-1">
                                    <label class="form-label" for="modal-phone-code">{{ translate('Phone Number') }}</label>
                                    <div class="phone-form-group">
                                        <input type="tel" id="modal-phone-code" class="form-control {{ $errors->has('phone') || $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('login_with') == 'phone' ? old('phone') : '' }}" name="phone" placeholder="" autocomplete="off">
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
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="********" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 text-right">
                            <a class="link-muted text-capitalize font-weight-normal" href="{{ route('password.request') }}">{{ translate('Forgot Password?') }}</a>
                        </div>

                        {{-- <div class="mb-5"> --}}
                            <button type="submit" class="btn btn-block btn-primary">{{ translate('Login to your Account') }}</button>
                        {{-- </div> --}}
                    </form>
                    @if (env("DEMO_MODE") == "On")
                        <div class="mb-4 mt-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>user2@example.com</td>
                                        <td>12345678</td>
                                        <td><button class="btn btn-outline-primary btn-xs" onclick="autoFill1()">{{ translate('Copy') }}</button></td>
                                    </tr>
                                    <tr>
                                        <td>user17@example.com</td>
                                        <td>12345678</td>
                                        <td><button class="btn btn-outline-primary btn-xs" onclick="autoFill2()">{{ translate('Copy') }}</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif


                    {{-- Social media Login --}}
                    @if(get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1 || get_setting('apple_login_activation') == 1)
                        <div class="separator mb-3 mt-4">
                            <span class="bg-white px-3 opacity-60">{{ translate('Or Login With')}}</span>
                        </div>
                        <ul class="list-inline social colored text-center mb-3">
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
     #LoginModal .login-tabs {
          background: #f8f9fa;
          border-radius: 30px;
          padding: 4px;
          display: inline-flex;
          margin: 0 auto;
          border: 1px solid #e9ecef !important;
     }
     #LoginModal .login-tabs .nav-link {
          border: none !important;
          color: #495057;
          background: transparent;
          transition: all 0.3s ease;
     }
     #LoginModal .login-tabs .nav-link.active {
          background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
          color: #fff !important;
          box-shadow: 0 4px 10px rgba(253, 44, 121, 0.2);
     }
</style>

<script type="text/javascript">
    $(document).ready(function() {
        // Initialize intl-tel-input for modal
        var countryData = window.intlTelInputGlobals.getCountryData(),
            modalInput = document.querySelector("#modal-phone-code");

        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            if (country.iso2 == 'bd') {
                country.dialCode = '88';
            }
        }

        var modalIti = intlTelInput(modalInput, {
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

        var country = modalIti.getSelectedCountryData();
        $(modalInput).closest('form').find('input[name=country_code]').val(country.dialCode);

        modalInput.addEventListener("countrychange", function(e) {
            var country = modalIti.getSelectedCountryData();
            $(modalInput).closest('form').find('input[name=country_code]').val(country.dialCode);
        });

        // Toggle login field state for modal
        function toggleModalRequired(tabId) {
            if (tabId === '#modal-email-login-pane') {
                $('#modal_login_with').val('email');
            } else {
                $('#modal_login_with').val('phone');
            }
        }

        // On modal tab switch
        $('#LoginModal a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            var targetPane = $(e.target).attr("href");
            toggleModalRequired(targetPane);
        });

        // Initialize state on load for modal
        var activeTab = $('#modal_login_with').val();
        if (activeTab === 'phone') {
            $('#modal-phone-login-tab').tab('show');
            toggleModalRequired('#modal-phone-login-pane');
        } else {
            $('#modal-email-login-tab').tab('show');
            toggleModalRequired('#modal-email-login-pane');
        }
    });
</script>
