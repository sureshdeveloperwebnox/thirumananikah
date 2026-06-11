<div class="aiz-user-sidenav-wrap pt-4 sticky-top c-scrollbar-light position-relative z-1 shadow-none">
    <div class="absolute-top-left d-xl-none">
        <button class="btn btn-sm p-2" data-toggle="class-toggle" data-target=".aiz-mobile-side-nav"
            data-same=".mobile-side-nav-thumb">
            <i class="las la-times la-2x"></i>
        </button>
    </div>
    <div class="aiz-user-sidenav rounded overflow-hidden">
        <div class="px-4 text-center mb-4">
            <div class="position-relative d-inline-block">
                <span class="avatar avatar-md mb-3 position-relative overflow-hidden d-inline-block avatar-upload-btn animate-hover" 
                      style="cursor: pointer; width: 90px; height: 90px; border-radius: 50%;"
                      onclick="openAizUploaderForAvatar(this);">
                    @if (Auth::user()->photo != null)
                        <img class="sidebar-avatar-img w-100 h-100 object-fit-cover rounded-circle" src="{{ uploaded_asset(Auth::user()->photo) }}" style="object-fit: cover;">
                    @else
                        <img class="sidebar-avatar-img w-100 h-100 object-fit-cover rounded-circle" src="{{ static_avatar(Auth::user()) }}" style="object-fit: cover;">
                    @endif
                    <div class="avatar-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center" style="top: 0; left: 0; background: rgba(0,0,0,0.55); opacity: 0; transition: all 0.3s ease; border-radius: 50%;">
                        <i class="las la-camera text-white" style="font-size: 1.5rem;"></i>
                    </div>
                    <div class="avatar-spinner position-absolute w-100 h-100 d-none align-items-center justify-content-center" style="top: 0; left: 0; background: rgba(0,0,0,0.60); border-radius: 50%;">
                        <div class="spinner-border text-white spinner-border-sm" role="status" style="width: 1.5rem; height: 1.5rem;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </span>
            </div>
            <h4 class="h5 fw-600">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h4>
        </div>
        <div class="text-center mb-3 px-3">
            <a href="{{ route('member_profile', Auth::user()->id) }}"
                class="btn btn-block btn-soft-primary">{{ translate('Public Profile') }}</a>
        </div>

        <div class="sidemnenu mb-3">
            <ul class="aiz-side-nav-list" data-toggle="aiz-side-menu">

                <li class="aiz-side-nav-item">
                    <a href="{{ route('dashboard') }}" class="aiz-side-nav-link {{ areActiveRoutes(['dashboard']) }}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('profile_settings') }}" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Manage Profile') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('gallery-image.index') }}" class="aiz-side-nav-link">
                        <i class="las la-image aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Gallery') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('happy_story.member') }}" class="aiz-side-nav-link">
                        <i class="las la-handshake aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Happy Story') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link">
                        <i class="las la-shopping-basket aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Packages') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('packages') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Packages') }}</span>
                            </a>
                        </li>
                        <li class="aiz-side-nav-item">
                            <a href="{{ route('package_purchase_history') }}" class="aiz-side-nav-link">
                                <span class="aiz-side-nav-text">{{ translate('Package Purchase History') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (get_setting('wallet_system'))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('wallet.index') }}" class="aiz-side-nav-link">
                            <i class="las la-dollar-sign aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('My Wallet') }}</span>
                        </a>
                    </li>
                @endif

                @if (addon_activation('referral_system'))
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-shopping-basket aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Referral System') }}</span>
                            @if (env('DEMO_MODE') == 'On')
                                <span class="badge badge-inline badge-danger">{{ translate('Addon') }}</span>
                            @endif
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('my_referred_users') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Referred Users') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('my_referral_earnings') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Referral Earnings') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('wallet_withdraw_request_history') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Wallet Withdraw Requests') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="aiz-side-nav-item">
                    <a href="{{ route('all.messages') }}" class="aiz-side-nav-link">
                        <i class="las la-envelope aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Message') }}</span>
                    </a>
                </li>
                @if (addon_activation('support_tickets'))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('support-tickets.user_index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['support-tickets.user_index', 'support-tickets.user_ticket_create']) }}">
                            <i class="las la-life-ring aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Support Ticket') }}</span>
                            @if (env('DEMO_MODE') == 'On')
                                <span class="badge badge-inline badge-danger">{{ translate('Addon') }}</span>
                            @endif
                        </a>
                    </li>
                @endif
                <li class="aiz-side-nav-item">
                    <a href="{{ route('my_interests.index') }}" class="aiz-side-nav-link">
                        <i class="la la-heart-o aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('My Interest') }}</span>
                    </a>
                </li>
                @if (get_setting('profile_picture_privacy') == 'only_me' || get_setting('gallery_image_privacy') == 'only_me')
                    <li class="aiz-side-nav-item">
                        <a href="javascript:void(0);" class="aiz-side-nav-link">
                            <i class="las la-images aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Picture View Requests') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            @if (get_setting('profile_picture_privacy') == 'only_me')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('profile-picture-view-request.index') }}"
                                        class="aiz-side-nav-link">
                                        <span
                                            class="aiz-side-nav-text">{{ translate('Profile Picture View Request') }}</span>
                                    </a>
                                </li>
                            @endif
                            @if (get_setting('gallery_image_privacy') == 'only_me')
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('gallery-image-view-request.index') }}"
                                        class="aiz-side-nav-link">
                                        <span
                                            class="aiz-side-nav-text">{{ translate('Gallery Image View Request') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="aiz-side-nav-item">
                    <a href="{{ route('my_shortlists') }}" class="aiz-side-nav-link">
                        <i class="las la-list aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Shortlist') }}</span>
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="{{ route('my_ignored_list') }}" class="aiz-side-nav-link">
                        <i class="las la-ban aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Ignored User List') }}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="{{ route('member.change_password') }}" class="aiz-side-nav-link">
                        <i class="las la-key aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Change Password') }}</span>
                    </a>
                </li>
                <!--<li class="aiz-side-nav-item">-->
                <!--    <a href="{{ route('profile_settings') }}" class="aiz-side-nav-link">-->
                <!--        <i class="las la-user aiz-side-nav-icon"></i>-->
                <!--        <span class="aiz-side-nav-text">{{ translate('Manage Profile') }}</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link" onclick="account_deactivation()">
                        @if (Auth::user()->deactivated == 0)
                            <i class="las la-lock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Deactive Account') }}</span>
                        @else
                            <i class="las la-unlock aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Reactive Account') }}</span>
                        @endif
                    </a>
                </li>
                <li class="aiz-side-nav-item">
                    <a href="javascript:void(0);" class="aiz-side-nav-link" onclick="account_delete()">
                        <i class="las la-trash aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Delete Account') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <a href="javascript:void(0);" class="btn btn-block btn-primary" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="las la-sign-out-alt"></i>
                <span>{{ translate('Logout') }}</span>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </div>
    </div>
</div>

<style>
    .avatar-upload-btn.animate-hover {
        transition: transform 0.2s ease-in-out;
    }
    .avatar-upload-btn.animate-hover:hover {
        transform: scale(1.05);
    }
    .avatar-upload-btn:hover .avatar-overlay {
        opacity: 1 !important;
    }
</style>

<script>
    function openAizUploaderForAvatar(btn) {
        if (typeof AIZ !== 'undefined' && AIZ.uploader) {
            AIZ.uploader.trigger(
                btn,
                'direct',
                'image',
                '',
                false,
                function(files) {
                    if (files && files.length > 0) {
                        var selectedFileId = files[0];
                        sendAvatarUpdateAjax(selectedFileId);
                    }
                }
            );
        } else {
            alert('{{ translate("Media library is still loading. Please try again.") }}');
        }
    }

    function sendAvatarUpdateAjax(selectedFileId) {
        // Show spinners for ALL avatars on the page
        var overlays = document.querySelectorAll('.avatar-overlay');
        var spinners = document.querySelectorAll('.avatar-spinner');
        
        overlays.forEach(function(overlay) {
            overlay.style.opacity = '0';
        });
        spinners.forEach(function(spinner) {
            spinner.classList.remove('d-none');
            spinner.classList.add('d-flex');
        });

        var formData = new FormData();
        formData.append('upload_id', selectedFileId);
        formData.append('_token', '{{ csrf_token() }}');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("member.avatar_update") }}', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        var avatarImgs = document.querySelectorAll('.sidebar-avatar-img');
                        avatarImgs.forEach(function(img) {
                            img.src = response.url;
                        });
                        
                        if (typeof AIZ !== 'undefined' && AIZ.plugins && AIZ.plugins.notify) {
                            AIZ.plugins.notify('success', response.message);
                        }
                        
                        if (response.photo_approved == 0) {
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        }
                    } else {
                        if (typeof AIZ !== 'undefined' && AIZ.plugins && AIZ.plugins.notify) {
                            AIZ.plugins.notify('danger', response.message || '{{ translate("Failed to update avatar.") }}');
                        }
                    }
                } catch (e) {
                    if (typeof AIZ !== 'undefined' && AIZ.plugins && AIZ.plugins.notify) {
                        AIZ.plugins.notify('danger', '{{ translate("Failed to parse response.") }}');
                    }
                }
            } else {
                var errorMsg = '{{ translate("Something went wrong. Please try again.") }}';
                try {
                    var errResponse = JSON.parse(xhr.responseText);
                    if (errResponse && errResponse.message) {
                        errorMsg = errResponse.message;
                    }
                } catch(e) {}
                if (typeof AIZ !== 'undefined' && AIZ.plugins && AIZ.plugins.notify) {
                    AIZ.plugins.notify('danger', errorMsg);
                }
            }
        };

        xhr.onerror = function() {
            if (typeof AIZ !== 'undefined' && AIZ.plugins && AIZ.plugins.notify) {
                AIZ.plugins.notify('danger', '{{ translate("Something went wrong. Please try again.") }}');
            }
        };

        xhr.onloadend = function() {
            spinners.forEach(function(spinner) {
                spinner.classList.remove('d-flex');
                spinner.classList.add('d-none');
            });
        };

        xhr.send(formData);
    }
</script>


