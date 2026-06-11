@extends('frontend.layouts.app')
@section('content')

<script>
  AOS.init();
</script>

    <!-- Homepage Slider Section -->
    @if (get_setting('show_homepage_slider') == 'on' && get_setting('home_slider_images') != null)
        <section class=" eb-slider position-relative overflow-hidden  d-flex home-slider-area">
            @php 
                $slider_images = json_decode(get_setting('home_slider_images'), true);  
                $slider_images_small = json_decode(get_setting('home_slider_images_small'), true);  
            @endphp
            <div class="absolute-full">
                <div class="aiz-carousel aiz-carousel-full h-100 d-none {{ get_setting('home_slider_images_small') != null ? 'd-md-block' : 'd-block' }}" data-fade='true' data-infinite='true' data-autoplay='true'>
                    @foreach ($slider_images as $key => $slider_image)
                        <img class="img-fit" src="{{ uploaded_asset($slider_image) }}">
                    @endforeach
                </div>
                @if (get_setting('home_slider_images_small') != null)
                    <div class="aiz-carousel aiz-carousel-full h-100 d-md-none" data-fade='true' data-infinite='true' data-autoplay='true'>
                        @foreach ($slider_images_small as $key => $slider_image)
                            <img class="img-fit" src="{{ uploaded_asset($slider_image) }}">
                        @endforeach
                    </div>
                @endif
                <div class="absolute-full bg-white opacity-0 d-md-none"></div>
            </div>
            <div class="container position-relative d-flex flex-column">
                <div class="row pt-11 pb-2 my-auto align-items-center justify-content-center">
                    <div class="col-xl-8 col-lg-12 my-4">
                        <div class="text-dark eb-text home-slider-text text-align-center" data-aos="fade-up"  data-aos-delay="100" data-aos-duration="2500">
                            {!! get_setting('home_slider_text') !!}
                        </div>
                    </div>
                    <style>
                    .eb-slider{
                        height:700px;
                    }
                        .eb-text h1{
                          font-size: 50px;
                          color: #fff;
                          animation: glow 2s infinite ease-in-out;
                          text-align:center;
                          
                        }

                        .eb-img-width{
                            height:500px;
                            width:500px;
                        }
                        .eb-heading-clr{
                            color:#320035;
                        }
                        .eb-h3{
                            color:#F5007E
                        }
                        .eb-hov-clr:hover{

                            background:#330036;
                        }
                         @media (max-width: 991px){
                             .eb-text h1{
                             font-size: 32px;
                                }
                            }
                      

                    </style>
                    
                    <!--@if (!Auth::check() && get_setting('show_homepage_slider_registration') == 'on')-->
                        <!--<div class="offset-xxl-2 offset-xl-1 col-lg-6 col-xxl-5">-->
                        <!--    <div class="card">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="mb-4 text-center">-->
                        <!--                <h2 class="h3 text-primary mb-0">{{ translate('Create Your Account') }}</h2>-->
                        <!--                <p>{{ translate('Fill out the form to get started') }}.</p>-->
                        <!--            </div>-->
                        <!--            <form class="form-default" id="reg-form" role="form"-->
                        <!--                action="{{ route('register') }}" method="POST">-->
                        <!--                @csrf-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-lg-12">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="on_behalf">{{ translate('On Behalf') }}</label>-->
                        <!--                            @php $on_behalves = \App\Models\OnBehalf::all(); @endphp-->
                        <!--                            <select-->
                        <!--                                class="form-control aiz-selectpicker @error('on_behalf') is-invalid @enderror"-->
                        <!--                                name="on_behalf" required>-->
                        <!--                                @foreach ($on_behalves as $on_behalf)-->
                        <!--                                    <option value="{{ $on_behalf->id }}">{{ $on_behalf->name }}-->
                        <!--                                    </option>-->
                        <!--                                @endforeach-->
                        <!--                            </select>-->
                        <!--                            @error('on_behalf')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="name">{{ translate('First Name') }}</label>-->
                        <!--                            <input type="text"-->
                        <!--                                class="form-control @error('first_name') is-invalid @enderror"-->
                        <!--                                name="first_name" id="first_name"-->
                        <!--                                placeholder="{{ translate('First Name') }}" required>-->
                        <!--                            @error('first_name')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="name">{{ translate('Last Name') }}</label>-->
                        <!--                            <input type="text"-->
                        <!--                                class="form-control @error('last_name') is-invalid @enderror"-->
                        <!--                                name="last_name" id="last_name"-->
                        <!--                                placeholder="{{ translate('Last Name') }}" required>-->
                        <!--                            @error('last_name')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="gender">{{ translate('Gender') }}</label>-->
                        <!--                            <select-->
                        <!--                                class="form-control aiz-selectpicker @error('gender') is-invalid @enderror"-->
                        <!--                                name="gender" required>-->
                        <!--                                <option value="1">{{ translate('Male') }}</option>-->
                        <!--                                <option value="2">{{ translate('Female') }}</option>-->
                        <!--                            </select>-->
                        <!--                            @error('gender')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="name">{{ translate('Date Of Birth') }}</label>-->
                        <!--                            <input type="text"-->
                        <!--                                class="form-control aiz-date-range @error('date_of_birth') is-invalid @enderror"-->
                        <!--                                name="date_of_birth" id="date_of_birth"-->
                        <!--                                placeholder="{{ translate('Date Of Birth') }}" data-single="true"-->
                        <!--                                data-show-dropdown="true" data-max-date="{{ get_max_date() }}"-->
                        <!--                                autocomplete="off" required>-->
                        <!--                            @error('date_of_birth')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                @if (addon_activation('otp_system'))-->
                        <!--                    <div>-->
                        <!--                        <div class="d-flex justify-content-between align-items-start">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="email">{{ translate('Email / Phone') }}</label>-->
                        <!--                            <button class="btn btn-link p-0 opacity-50 text-reset fs-12"-->
                        <!--                                type="button"-->
                        <!--                                onclick="toggleEmailPhone(this)">{{ translate('Use Email Instead') }}</button>-->
                        <!--                        </div>-->
                        <!--                        <div class="form-group phone-form-group mb-1">-->
                        <!--                            <input type="tel" id="phone-code"-->
                        <!--                                class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"-->
                        <!--                                value="{{ old('phone') }}" placeholder="" name="phone"-->
                        <!--                                autocomplete="off">-->
                        <!--                        </div>-->

                        <!--                        <input type="hidden" name="country_code" value="">-->

                        <!--                        <div class="form-group email-form-group mb-1 d-none">-->
                        <!--                            <input type="email"-->
                        <!--                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"-->
                        <!--                                value="{{ old('email') }}"-->
                        <!--                                placeholder="{{ translate('Email') }}" name="email"-->
                        <!--                                autocomplete="off">-->
                        <!--                            @if ($errors->has('email'))-->
                        <!--                                <span class="invalid-feedback" role="alert">-->
                        <!--                                    <strong>{{ $errors->first('email') }}</strong>-->
                        <!--                                </span>-->
                        <!--                            @endif-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                @else-->
                        <!--                    <div class="row">-->
                        <!--                        <div class="col-lg-12">-->
                        <!--                            <div class="form-group mb-3">-->
                        <!--                                <label class="form-label"-->
                        <!--                                    for="email">{{ translate('Email address') }}</label>-->
                        <!--                                <input type="email"-->
                        <!--                                    class="form-control @error('email') is-invalid @enderror"-->
                        <!--                                    name="email" id="signinSrEmail"-->
                        <!--                                    placeholder="{{ translate('Email Address') }}">-->
                        <!--                                @error('email')-->
                        <!--                                    <span class="invalid-feedback"-->
                        <!--                                        role="alert">{{ $message }}</span>-->
                        <!--                                @enderror-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                @endif-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="password">{{ translate('Password') }}</label>-->
                        <!--                            <input type="password"-->
                        <!--                                class="form-control @error('password') is-invalid @enderror"-->
                        <!--                                name="password" placeholder="********" aria-label="********"-->
                        <!--                                required>-->
                        <!--                            <small>{{ translate('Minimun 8 characters') }}</small>-->
                        <!--                            @error('password')-->
                        <!--                                <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                            @enderror-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-lg-6">-->
                        <!--                        <div class="form-group mb-3">-->
                        <!--                            <label class="form-label"-->
                        <!--                                for="password-confirm">{{ translate('Confirm password') }}</label>-->
                        <!--                            <input type="password" class="form-control"-->
                        <!--                                name="password_confirmation" placeholder="********" required>-->
                        <!--                            <small>{{ translate('Minimun 8 characters') }}</small>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                @if (addon_activation('referral_system'))-->
                        <!--                    <div class="row">-->
                        <!--                        <div class="col-lg-12">-->
                        <!--                            <div class="form-group mb-3">-->
                        <!--                                <label class="form-label"-->
                        <!--                                    for="email">{{ translate('Referral Code') }}</label>-->
                        <!--                                <input type="text"-->
                        <!--                                    class="form-control{{ $errors->has('referral_code') ? ' is-invalid' : '' }}"-->
                        <!--                                    value="{{ old('referral_code') }}"-->
                        <!--                                    placeholder="{{ translate('Referral Code') }}"-->
                        <!--                                    name="referral_code">-->
                        <!--                                @if ($errors->has('referral_code'))-->
                        <!--                                    <span class="invalid-feedback" role="alert">-->
                        <!--                                        <strong>{{ $errors->first('referral_code') }}</strong>-->
                        <!--                                    </span>-->
                        <!--                                @endif-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                @endif-->
                        <!--                @if (get_setting('google_recaptcha_activation') == 1)-->
                        <!--                    <div class="form-group">-->
                        <!--                        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>-->
                        <!--                        @error('g-recaptcha-response')-->
                        <!--                            <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                        @enderror-->
                        <!--                    </div>-->
                        <!--                @endif-->

                        <!--                <div class="mb-3">-->
                        <!--                    <label class="aiz-checkbox">-->
                        <!--                        <input type="checkbox" name="checkbox_example_1" required>-->
                        <!--                        <span class=opacity-60>{{ translate('By signing up you agree to our') }}-->
                        <!--                            <a href="{{ env('APP_URL') . '/terms-conditions' }}"-->
                        <!--                                target="_blank">{{ translate('terms and conditions') }}.</a>-->
                        <!--                        </span>-->
                        <!--                        <span class="aiz-square-check"></span>-->
                        <!--                    </label>-->
                        <!--                </div>-->
                        <!--                @error('checkbox_example_1')-->
                        <!--                    <span class="invalid-feedback" role="alert">{{ $message }}</span>-->
                        <!--                @enderror-->

                        <!--                <div class="">-->
                        <!--                    <button type="submit"-->
                        <!--                        class="btn btn-block btn-primary">{{ translate('Create Account') }}</button>-->
                        <!--                </div>-->
                        <!--                @if (get_setting('google_login_activation') == 1 || get_setting('facebook_login_activation') == 1 || get_setting('twitter_login_activation') == 1 || get_setting('apple_login_activation') == 1)-->
                        <!--                    <div class="mt-4">-->
                        <!--                        <div class="separator mb-3">-->
                        <!--                            <span class="bg-white px-3">{{ translate('Or Join With') }}</span>-->
                        <!--                        </div>-->
                        <!--                        <ul class="list-inline social colored text-center">-->
                        <!--                            @if (get_setting('facebook_login_activation') == 1)-->
                        <!--                                <li class="list-inline-item">-->
                        <!--                                    <a href="{{ route('social.login', ['provider' => 'facebook']) }}"-->
                        <!--                                        class="facebook"-->
                        <!--                                        title="{{ translate('Facebook') }}"><i-->
                        <!--                                            class="lab la-facebook-f"></i></a>-->
                        <!--                                </li>-->
                        <!--                            @endif-->
                        <!--                            @if (get_setting('google_login_activation') == 1)-->
                        <!--                                <li class="list-inline-item">-->
                        <!--                                    <a href="{{ route('social.login', ['provider' => 'google']) }}"-->
                        <!--                                        class="google"-->
                        <!--                                        title="{{ translate('Google') }}"><i-->
                        <!--                                            class="lab la-google"></i></a>-->
                        <!--                                </li>-->
                        <!--                            @endif-->
                        <!--                            @if (get_setting('twitter_login_activation') == 1)-->
                        <!--                                <li class="list-inline-item">-->
                        <!--                                    <a href="{{ route('social.login', ['provider' => 'twitter']) }}"-->
                        <!--                                        class="twitter"-->
                        <!--                                        title="{{ translate('Twitter') }}"><i-->
                        <!--                                            class="lab la-twitter"></i></a>-->
                        <!--                                </li>-->
                        <!--                            @endif-->
                        <!--                            @if (get_setting('apple_login_activation') == 1)-->
                        <!--                                <li class="list-inline-item">-->
                        <!--                                    <a href="{{ route('social.login', ['provider' => 'apple']) }}"-->
                        <!--                                        class="apple"-->
                        <!--                                        title="{{ translate('Apple') }}"><i-->
                        <!--                                            class="lab la-apple"></i></a>-->
                        <!--                                </li>-->
                        <!--                            @endif-->
                        <!--                        </ul>-->
                        <!--                    </div>-->
                        <!--                @endif-->
                        <!--            </form>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    <!--@endif-->
                </div>

                <!-- search  -->
                @if (Auth::check() && Auth::user()->user_type == 'member')
                <!--this is form page in login page-->
                    <!--<div class="p-4 bg-white rounded-top border-bottom"-->
                    <!--    style="box-shadow: 0 -25px 50px -12px rgb(0 0 0 / 25%);">-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-xl-10 mx-auto">-->
                    <!--            <form action="{{ route('member.listing') }}" method="get">-->
                    <!--                <div class="row gutters-5">-->
                    <!--                    <div class="col-lg">-->
                    <!--                        <div class="form-group mb-3">-->
                    <!--                            <label class="form-label"-->
                    <!--                                for="name">{{ translate('Age From') }}</label>-->
                    <!--                            <input type="number" name="age_from" class="form-control">-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg">-->
                    <!--                        <div class="form-group mb-3">-->
                    <!--                            <label class="form-label" for="name">{{ translate('To') }}</label>-->
                    <!--                            <input type="number" name="age_to" class="form-control">-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg">-->
                    <!--                        <div class="form-group mb-3">-->
                    <!--                            <label class="form-label"-->
                    <!--                                for="name">{{ translate('Religion') }}</label>-->
                    <!--                            @php $religions = \App\Models\Religion::all(); @endphp-->
                    <!--                            <select name="religion_id" id="religion_id"-->
                    <!--                                class="form-control aiz-selectpicker" data-live-search="true"-->
                    <!--                                data-container="body">-->
                    <!--                                <option value="">{{ translate('Choose One') }}</option>-->
                    <!--                                @foreach ($religions as $religion)-->
                    <!--                                    <option value="{{ $religion->id }}"> {{ $religion->name }}-->
                    <!--                                    </option>-->
                    <!--                                @endforeach-->
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg">-->
                    <!--                        <div class="form-group mb-3">-->
                    <!--                            <label class="form-label"-->
                    <!--                                for="name">{{ translate('Mother Tongue') }}</label>-->
                    <!--                            @php $mother_tongues = \App\Models\MemberLanguage::all(); @endphp-->
                    <!--                            <select name="mother_tongue" class="form-control aiz-selectpicker"-->
                    <!--                                data-live-search="true" data-container="body">-->
                    <!--                                <option value="">{{ translate('Select One') }}</option>-->
                    <!--                                @foreach ($mother_tongues as $mother_tongue_select)-->
                    <!--                                    <option value="{{ $mother_tongue_select->id }}">-->
                    <!--                                        {{ $mother_tongue_select->name }} </option>-->
                    <!--                                @endforeach-->
                    <!--                            </select>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="col-lg">-->
                    <!--                        <button type="submit"-->
                    <!--                            class="btn btn-block btn-primary mt-4">{{ translate('Search') }}</button>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </form>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                @endif

            </div>
        </section>
    @endif
        
   
       

<!--====================================================================================================================-->
  <!-- Hero Section -->
    <!-- <section class=" vh-100 d-flex align-items-center bg-primary text-light" style="background-image: url('https://source.unsplash.com/1600x900/?mosque'); background-size: cover;">
        <div class="container text-center">
            <h1 class="display-3 fw-bold" data-aos="fade-up">Find Your Life Partner, Rooted in Faith and Love</h1>
            <p class="lead" data-aos="fade-up" data-aos-delay="200">Connecting Muslim singles seeking a halal and meaningful marriage.</p>
            <a href="#" class="btn btn-light btn-lg mt-4" data-aos="fade-up" data-aos-delay="300">Get Started</a>
        </div>
    </section> -->

 <!-- Why Choose Us Section -->
<section class="p-7 eb-wcu-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-7 col-sm-12" data-aos="fade-right">
                <h5 class="eb-h3 mb-4">Welcome to Thirumana Nikah!</h5>
                <h1 class="fw-bold mb-3 eb-heading-clr">Begin Your Journey to a Blessed Marriage</h1>
                <p class="fs-18 text-justify text-dark">At Thirumana Nikah, we have helped countless Muslim singles worldwide find their perfect life partner, guided by the principles of faith and love. With us, you can connect with like-minded individuals who share your values, interests, and commitment to building a life together in accordance with Islamic teachings.</p>
                <a style="background:#330036;color:white;" href="https://thirumananikah.com/register" class="btn mt-3">Meet Your Partner Today</a>
            </div>
            <div class="col-md-5 col-sm-12 text-center" data-aos="fade-left">
                <img src="public/assets/img/c1.png" class="img-fluid" alt="Islamic Wedding">
            </div>
        </div>
    </div>
</section>

<!-- Section -->
<section class="section-2 text-center eb-pm-bg p-7">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-sm-12">
                <h5 class="mb-3 eb-h3">Find Your Perfect Match with Trust, Tradition, and True Compatibility</h5>
                <h1 class="section-heading eb-heading-clr">Thirumana Nikah: Where Islamic Values Meet Lifelong Companionship</h1>
                <p class="section-content fs-18">At Thirumana Nikah, we are dedicated to helping Muslims around the world find their ideal life partners in accordance with Islamic values and traditions. We understand that marriage is a sacred bond, and our platform is designed to make the search for a compatible spouse both respectful and rewarding...</p>
            </div>
        </div>
    </div>
</section>

<!-- Verified Profiles Section -->
<section class="eb-pm-bg">
    <div class="container">
        <div class="row section d-flex align-items-center" data-aos="fade-up">
            <div class="col-md-7 col-sm-12">
                <div class="text-left">
                    <!-- <div class="feature-icon">
                        <i class="fas fa-check-circle"></i>
                    </div> -->
                    <h3 class="mt-3 eb-base-color">Verified Profiles</h3>
                    <p class="feature-text">At Thirumana Nikah, we understand the importance of trust in finding a life partner. Our rigorous verification process ensures that each profile is thoroughly checked for authenticity...</p>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <img src="public/assets/img/vf (1).png" class="img-fluid" alt="Verified Profiles">
            </div>
        </div>
    </div>
</section>

<!-- Find Members Nearby Section -->
<section class="eb-pm-bg">
    <div class="container">
        <div class="row section d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-md-6 col-sm-12">
                <img src="public/assets/img/vf (2).png" class="img-fluid" alt="Find Members Nearby">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-right">
                    <!-- <div class="feature-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div> -->
                    <h3 class="mt-3 eb-base-color">Find Members Nearby</h3>
                    <p class="feature-text">Finding a life partner who shares your cultural and religious background is crucial, and so is finding someone close to your location...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Chat With Interested Members Section -->
<section class="eb-pm-bg">
    <div class="container">
        <div class="row section d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
            <div class="col-md-6 col-sm-12">
                <div class="text-left">
                    <!-- <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div> -->
                    <h3 class="mt-3 eb-base-color">Chat With Interested Members</h3>
                    <p class="feature-text">Engaging in meaningful conversations is key to finding the right life partner. Our platform offers a secure chat feature...</p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <img src="public/assets/img/vf (4).png" class="img-fluid" alt="Chat With Interested Members">
            </div>
        </div>
    </div>
</section>

<!-- Dedicated Support Section -->
<section class="eb-pm-bg">
    <div class="container">
        <div class="row section d-flex align-items-center" data-aos="fade-up" data-aos-delay="600">
            <div class="col-md-6 col-sm-12">
                <img src="public/assets/img/vf (3).png" class="img-fluid" alt="Dedicated Support">
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="text-right">
                    <!-- <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div> -->
                    <h3 class="mt-3 eb-base-color">Dedicated Support</h3>
                    <p class="feature-text">Our experienced relationship managers are here to assist you throughout your journey to find a life partner...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Responsive -->
<style>
    .eb-wcu-bg {
        background: #D6A99A;
    }

    .section {
        padding: 60px 0;
    }

    .feature-icon {
        font-size: 3rem;
        color: #007bff;
    }

    .feature-text {
        font-size: 1.25rem;
    }

    .btn-custom {
        background-color: #007bff;
        color: #fff;
        border-radius: 20px;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        .text-left, .text-right {
            text-align: center !important;
        }

        .feature-icon {
            margin-bottom: 20px;
        }

        .fs-18 {
            font-size: 16px;
        }

        .p-7 {
            padding: 30px 15px !important;
        }

        .section-heading {
            font-size: 1.8rem;
        }

        .feature-text {
            font-size: 1rem;
        }
    }

    @media (max-width: 576px) {
        .feature-text {
            font-size: 0.9rem;
        }

        h1, h3, h5 {
            font-size: 1.25rem !important;
        }

        .p-7 {
            padding: 20px 10px !important;
        }
    }
</style>

      

              <!-- How It Works Section -->
    <!-- <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold" data-aos="fade-up">How It Works</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">We make finding a spouse simple, transparent, and aligned with Islamic principles.</p>
            <div class="row g-4 mt-4">
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">1. Create Your Profile</h4>
                            <p class="card-text">Be honest about your values, lifestyle, and goals in your journey to finding a life partner.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">2. Discover Matches</h4>
                            <p class="card-text">Use our advanced filters to find individuals who align with your preferences and beliefs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">3. Start a Conversation</h4>
                            <p class="card-text">Engage in meaningful, private conversations to get to know your potential partner.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h4 class="card-title fw-bold">4. Commit to a Future</h4>
                            <p class="card-text">Take the next step and build a future together, rooted in love and guided by Islamic principles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- </div> -->
<!--====================================================================================================================-->

    
    
    @if (get_setting('show_premium_member_section') == 'on')
    <section class="p-7 pb-0 eb-pm-bg ">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                    <div class="text-center section-title mb-5">
                        <h1 class="fw-600 mb-3 eb-base-color ">{{ get_setting('premium_member_section_title') }}</h1>
                        <p class="eb-para-text opacity-60">{{ get_setting('premium_member_section_sub_title') }}</p>
                    </div>
                    <style>
                        .eb-pm-bg{
                            background:url("public/assets/img/bg.png") no-repeat top center;
                            background-size:cover;
                            background-attachment:fixed;
                        }

                        .eb-base-color{
                            color:#f5007e;
                        }

                        .eb-para-text{
                            color: black;
                            font-size: 18px;
                            font-weight: 500;
                        }

                        /* Premium tabs custom styling */
                        .premium-members-nav .nav-link {
                            border: none;
                            color: #777;
                            font-weight: 600;
                            font-size: 16px;
                            padding: 10px 24px;
                            border-radius: 30px;
                            transition: all 0.3s ease;
                            background: rgba(0, 0, 0, 0.05);
                            margin: 0 5px;
                        }
                        .premium-members-nav .nav-link.active {
                            background: #f5007e !important;
                            color: #fff !important;
                            box-shadow: 0 4px 15px rgba(245, 0, 126, 0.3);
                        }
                        .premium-members-nav .nav-link:hover {
                            color: #f5007e;
                            background: rgba(245, 0, 126, 0.1);
                        }
                        .premium-members-nav .nav-link.active:hover {
                            color: #fff;
                        }
                    </style>
                </div>
            </div>

            <!-- Tabs Navigation -->
            <div class="d-flex justify-content-center mb-5">
                <ul class="nav nav-pills premium-members-nav" id="premium-members-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="active-members-tab" data-toggle="pill" href="#active-members" role="tab" aria-controls="active-members" aria-selected="true">
                            <i class="las la-users mr-1"></i>{{ translate('Recently Active') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-members-tab" data-toggle="pill" href="#new-members" role="tab" aria-controls="new-members" aria-selected="false">
                            <i class="las la-user-plus mr-1"></i>{{ translate('Newly Registered') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Tabs Content -->
            <div class="tab-content" id="premium-members-tabContent">
                <div class="tab-pane fade show active" id="active-members" role="tabpanel" aria-labelledby="active-members-tab">
                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4"
                        data-md-items="3" data-sm-items="2" data-xs-items="1" data-dots='true' data-infinite='true' 
                        data-autoplay='true' data-autoplay-speed='4000'>
                        @foreach ($active_premium_members as $key => $member)
                            <div class="carousel-box">
                                @include('frontend.inc.member_box_1',['member'=>$member])
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="new-members" role="tabpanel" aria-labelledby="new-members-tab">
                    <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4"
                        data-md-items="3" data-sm-items="2" data-xs-items="1" data-dots='true' data-infinite='true' 
                        data-autoplay='true' data-autoplay-speed='4000'>
                        @foreach ($new_premium_members as $key => $member)
                            <div class="carousel-box">
                                @include('frontend.inc.member_box_1',['member'=>$member])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif



    <!-- Banner section 1 -->
    <!-- @if (get_setting('show_home_banner1_section') == 'on' && get_setting('home_banner1_images') != null)
        <section class="pt-7 bg-white">
            <div class="container">
                <div class="row gutters-10">
                    @php $banner_1_imags = json_decode(get_setting('home_banner1_images')); @endphp
                    @foreach ($banner_1_imags as $key => $value)
                        <div class="col-xl col-md-6">
                            <div class="mb-3">
                                <a href="{{ json_decode(get_setting('home_banner1_links'), true)[$key] }}"
                                    class="d-block text-reset">
                                    <img src="{{ static_asset('assets/img/placeholder-rect.jpg') }}"
                                        data-src="{{ uploaded_asset($banner_1_imags[$key]) }}"
                                        alt="{{ env('APP_NAME') }}" class="img-fluid lazyload w-100">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif -->

    <!-- How It Works Section -->
    @if (get_setting('show_how_it_works_section') == 'on' && get_setting('how_it_works_steps_titles') != null)
    <section class="py-7 eb-pm-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                    <div class="text-center section-title mb-5">
                        <h1 class=" eb-base-color fw-600 mb-3">{{ get_setting('how_it_works_title') }}</h1>
                        <p class="eb-para-text opacity-60">{{ get_setting('how_it_works_sub_title') }}</p>
                    </div>
                </div>
            </div>
            <div class="row gutters-10 d-flex justify-content-center">
                @php
                    $how_it_works_steps_titles = json_decode(get_setting('how_it_works_steps_titles'));
                    $step = 1;
                @endphp
                @foreach ($how_it_works_steps_titles as $key => $how_it_works_steps_title)
                    <div class="col-lg-4 d-flex">
                        <div class="border  p-3 mb-3 h-100 w-100 d-flex justify-content-between">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <div class="text-primary fw-600 h1">{{ $step++ }}</div>
                                    <div class="text-dark fs-20 mb-2 fw-600">{{ $how_it_works_steps_title }}</div>
                                    <div class="fs-15 opacity-60">
                                        {{ json_decode(get_setting('how_it_works_steps_sub_titles'), true)[$key] }}
                                    </div>
                                </div>
                                <div class="mt-3 col-5 text-right">
                                    <img src="{{ uploaded_asset(json_decode(get_setting('how_it_works_steps_icons'), true)[$key]) }}"
                                        class="img-fluid h-80px">
                                </div>
                            </div>
                        </div>
                                    <style>
                                        .eb-border-styling{
                                            
                                           
                                        }
                                       
                                    </style>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif


    <!-- Trusted by Millions Section -->
    @if (get_setting('show_trusted_by_millions_section') == 'on')
        <section class="bg-center bg-cover min-vh-90 p-7 text-white d-flex align-items-center bg-fixed"
            style="background-image: url('{{ uploaded_asset(get_setting('trusted_by_millions_background_image')) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 mx-auto">
                        <div class="text-center p-0">
                            <h1 class="fw-600 text-white">{{ get_setting('trusted_by_millions_title') }}</h1>
                            <div class="fs-16 fw-400">{{ get_setting('trusted_by_millions_sub_title') }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $homepage_best_features = json_decode(get_setting('homepage_best_features'));
                    @endphp
                    @if (!empty($homepage_best_features))
                        @foreach ($homepage_best_features as $key => $homepage_best_feature)
                            <div class="col-lg">
                                <div class="border rounded position-relative z-1 border-gray-600 overflow-hidden mt-4">
                                    <div class="absolute-full bg-dark opacity-60 z--1"></div>
                                    <div class="px-4 py-5 d-flex align-items-center justify-content-center">
                                        <img src="{{ uploaded_asset(json_decode(get_setting('homepage_best_features_icons'), true)[$key]) }}"
                                            class="img-fluid h-20px">
                                        <span class="fs-17 ml-2">{{ $homepage_best_feature }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    @endif

<!--===================================================================================================================-->


<!--slider secetion-->
<!--==========================================================================================================================-->

    <!-- New Member Section -->
   @if (get_setting('show_new_member_section') == 'on')
    <section class="py-7 eb-pm-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                    <div class="text-center section-title mb-5">
                        <h1 class="fw-600 mb-3 eb-base-color">{{ get_setting('new_member_section_title') }}</h1>
                        <p class="fw-400 fs-16 ">{{ get_setting('new_member_section_sub_title') }}</p>
                    </div>
                </div>
            </div>
            <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="5" data-xl-items="4" data-lg-items="4"
                data-md-items="3" data-sm-items="2" data-xs-items="1" data-dots='true' data-infinite='true'
                data-autoplay='true' data-autoplay-speed='4000'>
                @foreach ($new_members as $key => $member)
                    <div class="carousel-box">
                        @include('frontend.inc.member_box_1',['member'=>$member])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

    
    
    
     <!--@if (get_setting('show_blog_section') == 'on')-->
       <section class="bg-white text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                <div class="text-center section-title mb-5">
                    <!--<h2 class="fw-800 mb-3 text-dark">{{ get_setting('blog_section_title') }}</h2>-->
                    <h2 class="fw-800 mb-3 eb-base-color">Blog</h2>
                </div>
            </div>
        </div>
        <div class="aiz-carousel gutters-10" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1"
            data-arrows='true' data-autoplay='true' data-autoplay-speed='4000'>
            @php
                $blogs = \App\Models\Blog::query()
                    ->where('status', 1)
                    ->latest()
                    ->limit(get_setting('max_blog_show_homepage'))
                    ->get();
            @endphp
            @foreach ($blogs as $key => $blog)
                <div class="carousel-box p-1">
                    <div class="card mb-3 overflow-hidden shadow-sm text-dark">
                        <a href="{{ route('blog.details', $blog->slug) }}" class="text-reset d-block">
                            <img src="{{ uploaded_asset($blog->banner) }}" alt="{{ $blog->title }}" class="h-200px img-fit">
                        </a>
                        <div class="p-4">
                            <h2 class="fs-18 fw-600 mb-1">
                                <a href="{{ route('blog.details', $blog->slug) }}" class="text-reset">
                                    {{ $blog->title }}
                                </a>
                            </h2>
                            @if ($blog->category != null)
                                <div class="mb-2 opacity-50">
                                    <i>{{ $blog->category->category_name }}</i>
                                </div>
                            @endif
                            <p class="opacity-70 mb-4">{{ $blog->short_description }}</p>
                            <a href="{{ route('blog.details', $blog->slug) }}" class="btn btn-soft-primary">{{ translate('View More') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('blog') }}" class="btn btn-primary">{{ translate('View More') }}</a>
        </div>
    </div>
</section>

    <!--@endif-->
    
    
    
    <!-- happy Story Section -->
    @if (get_setting('show_happy_story_section') == 'on')
        <section class="py-7 text-white eb-pm-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h1 class="fw-600 mb-3 eb-base-color">Happy Stories</h1>
                        </div>
                       
                    </div>
                </div>
                <div
                    class="card-columns column-gap-10 card-columns-xxl-4 card-columns-lg-4 card-columns-md-2 card-columns-1">
                    @php
                        $happy_stories = \App\Models\HappyStory::where('approved', '1')
                            ->latest()
                            ->limit(get_setting('max_happy_story_show_homepage'))
                            ->get();
                    @endphp
                    @foreach ($happy_stories as $key => $happy_story)
                        @php
                            $photo = explode(',', $happy_story->photos);
                        @endphp
                        <div class="card border-gray-800 overflow-hidden mb-2">
                            <a href="{{ route('story_details', $happy_story->id) }}"
                                class="text-reset d-block position-relative">
                                <img src="{{ uploaded_asset($photo[0]) }}" class="img-fluid">
                                <div class="absolute-bottom-left p-3">
                                    <div class="position-relative z-1 p-3">
                                        <div class="absolute-full z--1 bg-dark opacity-60"></div>
                                        <div class="text-white fs-18">
                                            {{ $happy_story->user->first_name . ' & ' . $happy_story->partner_name }}</div>
                                        <h5 class="text-white ">
                                            {{ $happy_story->title }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        
                        
                        
                        <!-- <div class="card border-gray-800 overflow-hidden mb-2">
                            <a href="{{ route('story_details', $happy_story->id) }}"
                                class="text-reset d-block position-relative">
                                <img src="{{ uploaded_asset($photo[0]) }}" class="img-fluid">
                                <div class="absolute-bottom-left p-3">
                                    <div class="position-relative z-1 p-3">
                                        <div class="absolute-full z--1 bg-dark opacity-60"></div>
                                        <div class="text-white fs-18">
                                            {{ $happy_story->user->first_name . ' & ' . $happy_story->partner_name }}</div>
                                        <h5 class="text-white ">
                                            {{ $happy_story->title }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div> -->
                    @endforeach
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('happy_stories') }}" class="btn btn-primary eb-button">{{ translate('View More') }}</a>
                </div>
            </div>
        </section>
        <style>
        .eb-button{
            background:white;
            color:red;
        }
            .eb-hs-bg{
                background:url("../public/assets/img/bg-12.jpg")no-repeat top center;
                background-size:cover;
                background-attachment:fixed;
            }
        </style>
    @endif
<!-- package section starts -->

    @if (get_setting('show_homapege_package_section') == 'on')
        <section class="pb-7 eb-pm-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-xxl-6 mx-auto">
                        <div class="text-center pb-6">
                            <h1 class="fw-600 eb-base-color">{{ get_setting('homepage_package_section_title') }}</h1>
                            <div class="fs-16 fw-400">{{ get_setting('homepage_package_section_sub_title') }}</div>
                        </div>
                    </div>
                </div>
                <div class="aiz-carousel" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1"
                    data-dots='true' data-infinite='true' data-autoplay='true'>
                    @foreach (\App\Models\Package::where('active', '1')->get() as $key => $package)
                        <div class="carousel-box">
                            <div class="overflow-hidden shadow-none mb-3 border-right">
                                <div class="card-body">
                                    <div class="text-center mb-4 mt-3">
                                        <img class="mw-100 mx-auto mb-4" src="{{ uploaded_asset($package->image) }}"
                                            height="130">
                                        <h5 class="mb-3 h5 fw-600">{{ $package->name }}</h5>
                                    </div>
                                    <ul class="list-group list-group-raw fs-15 mb-5">
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            {{ $package->express_interest }} {{ translate('Express Interests') }}
                                        </li>
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            {{ $package->photo_gallery }} {{ translate('Gallery Photo Upload') }}
                                        </li>
                                        <li class="list-group-item py-2">
                                            <i class="las la-check text-success mr-2"></i>
                                            {{ $package->contact }} {{ translate('Contact Info View') }}
                                        </li>
                                        <li class="list-group-item py-2 text-line-through">
                                            @if ($package->auto_profile_match == 0)
                                                <i class="las la-times text-danger mr-2"></i>
                                                <del
                                                    class="opacity-60">{{ translate('Show Auto Profile Match') }}</del>
                                            @else
                                                <i class="las la-check text-success mr-2"></i>
                                                {{ translate('Show Auto Profile Match') }}
                                            @endif
                                        </li>
                                    </ul>
                                    <div class="mb-5 text-dark text-center">
                                        @if ($package->id == 1)
                                            <span class="display-4 fw-600 lh-1 mb-0">{{ translate('Free') }}</span>
                                        @else
                                            <span
                                                class="display-4 fw-600 lh-1 mb-0">{{ single_price($package->price) }}</span>
                                        @endif
                                        <span class="text-secondary d-block">{{ $package->validity }}
                                            {{ translate('Days') }}</span>
                                    </div>
                                    <div class="text-center mb-3">
                                        @if ($package->id != 1)
                                            @if (Auth::check())
                                                <a href="{{ route('package_payment_methods', encrypt($package->id)) }}"
                                                    type="submit"
                                                    class="btn btn-primary">{{ translate('Purchase This Package') }}</a>
                                            @else
                                                <button type="submit" onclick="loginModal()"
                                                    class="btn btn-primary border-0 eb-hov-clr">{{ translate('Purchase This Package') }}</button>
                                            @endif
                                        @else
                                            <a href="javascript:void(0);"
                                                class="btn btn-light"><del>{{ translate('Purchase This Package') }}</del></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

   

    <!-- package section ends -->
     


    <!--@if (get_setting('show_homepage_review_section') == 'on' && get_setting('homepage_reviews') != null)-->
        <section class="py-7 bg-cover bg-center text-white"
            style="background-image: url('{{ uploaded_asset(get_setting('homepage_review_section_background_image')) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-9 col-xxl-6 mx-auto">
                        <div class="text-center section-title mb-5">
                            <h1 class="fw-600 mb-3 text-white ">{{ get_setting('homepage_review_section_title') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-10 mx-auto">
                        <div class="aiz-carousel large-arrow" data-items="1" data-arrows='true' data-infinite='true'
                            data-autoplay='true'>
                            @foreach (json_decode(get_setting('homepage_reviews')) as $key => $review)
                                <div class="carousel-box">
                                    <div class="text-center px-lg-9">
                                        <img src="{{ uploaded_asset(json_decode(get_setting('homepage_reviewers_images'), true)[$key]) }}"
                                            class="size-180px img-fit mx-auto rounded-circle border border-white border-width-5 shadow-lg mb-5">
                                        <div class="fs-18 fw-400 font-italic text-white">{{ $review }}</div>
                                        <i class="las la-quote-right la-10x text-white"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--@endif-->

    <!--@if (get_setting('show_blog_section') == 'on')-->
        <!--<section class="py-7 bg-white text-white">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">-->
        <!--                <div class="text-center section-title mb-5">-->
        <!--                    <h2 class="fw-800 mb-3 text-dark">{{ get_setting('blog_section_title') }}</h2>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="aiz-carousel gutters-10" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1"-->
        <!--            data-arrows='true'>-->
        <!--            @php-->
        <!--                $blogs = \App\Models\Blog::query()-->
        <!--                    ->where('status', 1)-->
        <!--                    ->latest()-->
        <!--                    ->limit(get_setting('max_blog_show_homepage'))-->
        <!--                    ->get();-->
        <!--            @endphp-->
        <!--            @foreach ($blogs as $key => $blog)-->
        <!--                <div class="caorusel-box p-1">-->
        <!--                    <div class="card mb-3 overflow-hidden shadow-sm text-dark">-->
        <!--                        <a href="{{ route('blog.details', $blog->slug) }}" class="text-reset d-block">-->
        <!--                            <img src="{{ uploaded_asset($blog->banner) }}" alt="{{ $blog->title }}"-->
        <!--                                class="h-200px img-fit">-->
        <!--                        </a>-->
        <!--                        <div class="p-4">-->
        <!--                            <h2 class="fs-18 fw-600 mb-1">-->
        <!--                                <a href="{{ route('blog.details', $blog->slug) }}" class="text-reset">-->
        <!--                                    {{ $blog->title }}-->
        <!--                                </a>-->
        <!--                            </h2>-->
        <!--                            @if ($blog->category != null)-->
        <!--                                <div class="mb-2 opacity-50">-->
        <!--                                    <i>{{ $blog->category->category_name }}</i>-->
        <!--                                </div>-->
        <!--                            @endif-->
        <!--                            <p class="opacity-70 mb-4">{{ $blog->short_description }}</p>-->
        <!--                            <a href="{{ route('blog.details', $blog->slug) }}"-->
        <!--                                class="btn btn-soft-primary">{{ translate('View More') }}</a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            @endforeach-->
        <!--        </div>-->
        <!--        <div class="text-center mt-4">-->
        <!--            <a href="{{ route('blog') }}" class="btn btn-primary">{{ translate('View More') }}</a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
    <!--@endif-->

@endsection

@section('modal')
    @include('modals.login_modal')
    @include('modals.package_update_alert_modal')
@endsection

@section('script')
    <script type="text/javascript">
        function loginModal() {
            $('#LoginModal').modal();
        }

        function package_update_alert() {
            $('.package_update_alert_modal').modal('show');
        }

        $(document).ready(function() {
            $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
                if (typeof $.fn.slick !== 'undefined') {
                    $('.aiz-carousel').slick('setPosition');
                }
            });
        });
    </script>
    
    
    @if(get_setting('google_recaptcha_activation') == 1)
        @include('partials.recaptcha')
    @endif
    @if(addon_activation('otp_system'))
        @include('partials.emailOrPhone')
    @endif
@endsection

 <style>
        /* WhatsApp icon floating at bottom-right */
        .whatsapp-float {
            position: fixed;
            bottom: 120px;
            left: 20px;
            z-index: 1000;
        }

        .whatsapp-float i {
            font-size: 2rem;
            color: white;
        }

        .whatsapp-btn {
            background-color: #25D366; /* WhatsApp green color */
            border-radius: 50%;
            padding: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
        .phone-float {
            position: fixed;
            bottom: 50px;
            left: 20px;
            z-index: 1000;
        }

        .phone-float i {
            font-size: 2rem;
            color: white;
        }

        .phone-btn {
            background-color: #000;
            border-radius: 50%;
            padding: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }
    </style>


    <!-- Your website content -->

    <!-- WhatsApp Floating Icon -->
    <a href="https://wa.me/+919443993139" target="_blank" class="whatsapp-float">
        <div class="whatsapp-btn">
            <i class="fab fa-whatsapp"></i>
        </div>
    </a>
    <a href="#" target="_blank" class="phone-float">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="48px" width="48px" version="1.1" id="Layer_1" viewBox="0 0 511.999 511.999" xml:space="preserve">
            <g>
                <path style="fill:#32BBFF;" d="M382.369,175.623C322.891,142.356,227.427,88.937,79.355,6.028   C69.372-0.565,57.886-1.429,47.962,1.93l254.05,254.05L382.369,175.623z"/>
                <path style="fill:#32BBFF;" d="M47.962,1.93c-1.86,0.63-3.67,1.39-5.401,2.308C31.602,10.166,23.549,21.573,23.549,36v439.96   c0,14.427,8.052,25.834,19.012,31.761c1.728,0.917,3.537,1.68,5.395,2.314L302.012,255.98L47.962,1.93z"/>
                <path style="fill:#32BBFF;" d="M302.012,255.98L47.956,510.035c9.927,3.384,21.413,2.586,31.399-4.103   c143.598-80.41,237.986-133.196,298.152-166.746c1.675-0.941,3.316-1.861,4.938-2.772L302.012,255.98z"/>
            </g>
            <path style="fill:#2C9FD9;" d="M23.549,255.98v219.98c0,14.427,8.052,25.834,19.012,31.761c1.728,0.917,3.537,1.68,5.395,2.314  L302.012,255.98H23.549z"/>
            <path style="fill:#29CC5E;" d="M79.355,6.028C67.5-1.8,53.52-1.577,42.561,4.239l255.595,255.596l84.212-84.212  C322.891,142.356,227.427,88.937,79.355,6.028z"/>
            <path style="fill:#D93F21;" d="M298.158,252.126L42.561,507.721c10.96,5.815,24.939,6.151,36.794-1.789  c143.598-80.41,237.986-133.196,298.152-166.746c1.675-0.941,3.316-1.861,4.938-2.772L298.158,252.126z"/>
            <path style="fill:#FFD500;" d="M488.45,255.98c0-12.19-6.151-24.492-18.342-31.314c0,0-22.799-12.721-92.682-51.809l-83.123,83.123  l83.204,83.205c69.116-38.807,92.6-51.892,92.6-51.892C482.299,280.472,488.45,268.17,488.45,255.98z"/>
            <path style="fill:#FFAA00;" d="M470.108,287.294c12.191-6.822,18.342-19.124,18.342-31.314H294.303l83.204,83.205  C446.624,300.379,470.108,287.294,470.108,287.294z"/>
            </svg>
    </a>

    <!-- <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c"></meta>

<div id="google_translate_element">
</div>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

<!-- <div class="translate">
  <div id="google_translate_element">
    <div dir="ltr" class="skiptranslate goog-te-gadget">
      <div id=":0.targetLanguage">
        <select class="goog-te-combo">
          <option value="">Select Language</option>
          <option value="af">Afrikaans</option>
          <option value="sq">Albanian</option>
          <option value="ar">Arabic</option>
          <option value="hy">Armenian</option>
          <option value="az">Azerbaijani</option>
          <option value="eu">Basque</option>
          <option value="be">Belarusian</option>
          <option value="bn">Bengali</option>
          <option value="bg">Bulgarian</option>
          <option value="ca">Catalan</option>
          <option value="zh-CN">Chinese (Simplified)</option>
          <option value="zh-TW">Chinese (Traditional)</option>
          <option value="hr">Croatian</option>
          <option value="cs">Czech</option>
          <option value="da">Danish</option>
          <option value="nl">Dutch</option>
          <option value="eo">Esperanto</option>
          <option value="et">Estonian</option>
          <option value="tl">Filipino</option>
          <option value="fi">Finnish</option>
          <option value="fr">French</option>
          <option value="gl">Galician</option>
          <option value="ka">Georgian</option>
          <option value="de">German</option>
          <option value="el">Greek</option>
          <option value="gu">Gujarati</option>
          <option value="ht">Haitian Creole</option>
          <option value="iw">Hebrew</option>
          <option value="hi">Hindi</option>
          <option value="hu">Hungarian</option>
          <option value="is">Icelandic</option>
          <option value="id">Indonesian</option>
          <option value="ga">Irish</option>
          <option value="it">Italian</option>
          <option value="ja">Japanese</option>
          <option value="kn">Kannada</option>
          <option value="ko">Korean</option>
          <option value="la">Latin</option>
          <option value="lv">Latvian</option>
          <option value="lt">Lithuanian</option>
          <option value="mk">Macedonian</option>
          <option value="ms">Malay</option>
          <option value="mt">Maltese</option>
          <option value="no">Norwegian</option>
          <option value="fa">Persian</option>
          <option value="pl">Polish</option>
          <option value="pt">Portuguese</option>
          <option value="ro">Romanian</option>
          <option value="ru">Russian</option>
          <option value="sr">Serbian</option>
          <option value="sk">Slovak</option>
          <option value="sl">Slovenian</option>
          <option value="es">Spanish</option>
          <option value="sw">Swahili</option>
          <option value="sv">Swedish</option>
          <option value="ta">Tamil</option>
          <option value="te">Telugu</option>
          <option value="th">Thai</option>
          <option value="tr">Turkish</option>
          <option value="uk">Ukrainian</option>
          <option value="ur">Urdu</option>
          <option value="vi">Vietnamese</option>
          <option value="cy">Welsh</option>
          <option value="yi">Yiddish</option>
        </select>
      </div>
      Powered by 
      <span style="white-space: nowrap;">
        <a class="goog-logo-link" href="http://translate.google.com" target="_blank">
          <img style="padding-right: 3px;" src="http://www.google .com/images/logos/google_logo_41.png" width="37" height="13">
          Translate
        </a>
      </span>
    </div>
  </div>
  <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_element');
    }
  </script>
</div> -->


