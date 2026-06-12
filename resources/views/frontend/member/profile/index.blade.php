@extends('frontend.layouts.member_panel')
@section('panel_content')
   <div class=" card">
    <div class="card-header">
        <h4 class="text-center mb-0 h6">{{translate('Important Reminder')}}</h4>
    </div>
    <div class="card-body">
        <p class="mb-0 fs-18">
            {{translate('Please make sure to update every section after entering the required details to ensure your information is saved correctly.')}}
        </p>
    </div>
</div>

    
    
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Introduction')}}</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('member.introduction.update', $member->member->id) }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label class="col-md-2 col-form-label">{{translate('Introduction')}}</label>
                    <div class="col-md-10">
                        <textarea type="text" name="introduction" class="form-control" rows="4" placeholder="{{translate('Introduction')}}" required>{{ $member->member->introduction }}</textarea>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Basic Information -->
    @php
        $permanent_address      = \App\Models\Address::where('type','permanent')->where('user_id',$member->id)->first();
        $permanent_country_id   = $permanent_address->country_id ?? "";
        $permanent_state_id     = $permanent_address->state_id ?? "";
        $permanent_city_id      = $permanent_address->city_id ?? "";
        $permanent_postal_code  = $permanent_address->postal_code ?? "";
    @endphp
    @include('frontend.member.profile.basic_info')

    <!-- Present Address -->
    @php
        $present_address      = \App\Models\Address::where('type','present')->where('user_id',$member->id)->first();
        $present_country_id   = $present_address->country_id ?? "";
        $present_state_id     = $present_address->state_id ?? "";
        $present_city_id      = $present_address->city_id ?? "";
        $present_postal_code  = $present_address->postal_code ?? "";
    @endphp
    @if(get_setting('member_present_address_section') == 'on')
      @include('frontend.member.profile.present_address')
    @endif

    <!-- Education -->
    @if(get_setting('member_education_section') == 'on')
      @include('frontend.member.profile.education.index')
    @endif

    <!-- Career -->
    @if(get_setting('member_career_section') == 'on')
      @include('frontend.member.profile.career.index')
    @endif

    <!-- Physical Attributes -->
    @if(get_setting('member_physical_attributes_section') == 'on')
      @include('frontend.member.profile.physical_attributes')
    @endif

    {{-- <!-- Language -->
    @if(get_setting('member_language_section') == 'on')
      @include('frontend.member.profile.language')
    @endif --}}

    <!-- Hobbies  -->
    @if(get_setting('member_hobbies_and_interests_section') == 'on')
      @include('frontend.member.profile.hobbies_interest')
    @endif

    <!-- Personal Attitude & Behavior -->
    @if(get_setting('member_personal_attitude_and_behavior_section') == 'on')
      @include('frontend.member.profile.attitudes_behavior')
    @endif

    <!-- Residency Information -->
    @if(get_setting('member_residency_information_section') == 'on')
      @include('frontend.member.profile.residency_information')
    @endif

    <!-- Spiritual & Social Background -->
    @php
        $member_religion_id   =  $member->spiritual_backgrounds->religion_id ?? "";
        $member_caste_id      =  $member->spiritual_backgrounds->caste_id ?? "";
        $member_sub_caste_id  =  $member->spiritual_backgrounds->sub_caste_id ?? "";
    @endphp
    @if(get_setting('member_spiritual_and_social_background_section') == 'on')
      @include('frontend.member.profile.spiritual_backgrounds')
    @endif

    <!-- Life Style -->
    @if(get_setting('member_life_style_section') == 'on')
      @include('frontend.member.profile.lifestyle')
    @endif

    <!-- Astronomic Information  -->
    @if(get_setting('member_astronomic_information_section') == 'on')
      @include('frontend.member.profile.astronomic_information')
    @endif

    {{-- <!-- Permanent Address -->
    @if(get_setting('member_permanent_address_section') == 'on')
      @include('frontend.member.profile.permanent_address')
    @endif --}}

    <!-- Family Information -->
    {{-- @if(get_setting('member_family_information_section') == 'on')
      @include('frontend.member.profile.family_information')
    @endif --}}

    <!-- Partner Expectation -->
    @php
        $partner_religion_id   = $member->partner_expectations->religion_id ?? "";
        $partner_caste_id      = $member->partner_expectations->caste_id ?? "";
        $partner_sub_caste_id  = $member->partner_expectations->sub_caste_id ?? "";
        $partner_country_id    = $member->partner_expectations->preferred_country_id ?? "";
        $partner_city_id       = $member->partner_expectations->partner_city_id ?? "";
        $partner_state_id      = $member->partner_expectations->preferred_state_id ?? "";
    @endphp
    @if(get_setting('member_partner_expectation_section') == 'on')
      @include('frontend.member.profile.partner_expectation')
    @endif

    @include('frontend.member.profile.religiousness.index')

    @if(get_setting('additional_profile_section') == 'on')
      @include('frontend.member.profile.additional_attributes')
    @endif

@endsection

@section('modal')
    @include('modals.create_edit_modal')
    @include('modals.delete_modal')
@endsection

<!---->
<!-- Popup Modal for Important Reminder -->
<div class="modal fade" id="importantReminderModal" tabindex="-1" role="dialog" aria-labelledby="importantReminderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importantReminderModalLabel">{{translate('Important Reminder')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{translate('Please make sure to update every section after entering the required details to ensure your information is saved correctly.')}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">{{translate('Got it')}}</button>
      </div>
    </div>
  </div>
</div>

<!---->


<!---->

@section('script')
<script type="text/javascript">

    $(document).ready(function(){
         $('#importantReminderModal').modal('show');
         
        get_states_by_country_for_present_address();
        get_cities_by_state_for_present_address();
        get_states_by_country_for_permanent_address();
        get_cities_by_state_for_permanent_address();
        get_castes_by_religion_for_member();
        get_sub_castes_by_caste_for_member();
        get_castes_by_religion_for_partner();
        get_sub_castes_by_caste_for_partner();
        get_states_by_country_for_partner();
        get_cities_by_state_for_partner_expectation();
    });

    // For Present address
    function get_states_by_country_for_present_address(){
        var present_country_id = $('#present_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:present_country_id}, function(data){
                $('#present_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#present_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#present_state_id > option").each(function() {
                    if(this.value == '{{$present_state_id}}'){
                        $("#present_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_present_address();
            });
        }

    function get_cities_by_state_for_present_address(){
		var present_state_id = $('#present_state_id').val();
    		$.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:present_state_id}, function(data){
    		    $('#present_city_id').html(null);
    		    for (var i = 0; i < data.length; i++) {
    		        $('#present_city_id').append($('<option>', {
    		            value: data[i].id,
    		            text: data[i].name
    		        }));
    		    }
    		    $("#present_city_id > option").each(function() {
    		        if(this.value == '{{$present_city_id}}'){
    		            $("#present_city_id").val(this.value).change();
    		        }
    		    });

    		    AIZ.plugins.bootstrapSelect('refresh');
    		});
    	}

    $('#present_country_id').on('change', function() {
  	    get_states_by_country_for_present_address();
  	});

    $('#present_state_id').on('change', function() {
  	    get_cities_by_state_for_present_address();
  	});

    // For permanent address
    function get_states_by_country_for_permanent_address(){
        var permanent_country_id = $('#permanent_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:permanent_country_id}, function(data){
                $('#permanent_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_state_id > option").each(function() {
                    if(this.value == '{{$permanent_state_id}}'){
                        $("#permanent_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');

                get_cities_by_state_for_permanent_address();
            });
    }

    function get_cities_by_state_for_permanent_address(){
        var permanent_state_id = $('#permanent_state_id').val();
            $.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:permanent_state_id}, function(data){
                $('#permanent_city_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#permanent_city_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#permanent_city_id > option").each(function() {
                    if(this.value == '{{$permanent_city_id}}'){
                        $("#permanent_city_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#permanent_country_id').on('change', function() {
        get_states_by_country_for_permanent_address();
    });

    $('#permanent_state_id').on('change', function() {
        get_cities_by_state_for_permanent_address();
    });

    // get castes and subcastes For member
    function get_castes_by_religion_for_member(){
        var member_religion_id = $('#member_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:member_religion_id}, function(data){
                $('#member_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_caste_id > option").each(function() {
                    if(this.value == '{{$member_caste_id}}'){
                        $("#member_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_member();
            });
        }

    function get_sub_castes_by_caste_for_member(){
        var member_caste_id = $('#member_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:member_caste_id}, function(data){
                $('#member_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#member_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#member_sub_caste_id > option").each(function() {
                    if(this.value == '{{$member_sub_caste_id}}'){
                        $("#member_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#member_religion_id').on('change', function() {
        get_castes_by_religion_for_member();
    });

    $('#member_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_member();
    });

    // get castes and subcastes For partner
    function get_castes_by_religion_for_partner(){
        var partner_religion_id = $('#partner_religion_id').val();
            $.post('{{ route('castes.get_caste_by_religion') }}',{_token:'{{ csrf_token() }}', religion_id:partner_religion_id}, function(data){
                $('#partner_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_caste_id > option").each(function() {
                    if(this.value == '{{$partner_caste_id}}'){
                        $("#partner_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');

                get_sub_castes_by_caste_for_partner();
            });
        }

    function get_sub_castes_by_caste_for_partner(){
        var partner_caste_id = $('#partner_caste_id').val();
            $.post('{{ route('sub_castes.get_sub_castes_by_religion') }}',{_token:'{{ csrf_token() }}', caste_id:partner_caste_id}, function(data){
                $('#partner_sub_caste_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_sub_caste_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_sub_caste_id > option").each(function() {
                    if(this.value == '{{$partner_sub_caste_id}}'){
                        $("#partner_sub_caste_id").val(this.value).change();
                    }
                });
                AIZ.plugins.bootstrapSelect('refresh');
            });
        }

    $('#partner_religion_id').on('change', function() {
        get_castes_by_religion_for_partner();
    });

    $('#partner_caste_id').on('change', function() {
        get_sub_castes_by_caste_for_partner();
    });

    // For partner address
    function get_states_by_country_for_partner(){
        var partner_country_id = $('#partner_country_id').val();
            $.post('{{ route('states.get_state_by_country') }}',{_token:'{{ csrf_token() }}', country_id:partner_country_id}, function(data){
                $('#partner_state_id').html(null);
                for (var i = 0; i < data.length; i++) {
                    $('#partner_state_id').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
                $("#partner_state_id > option").each(function() {
                    if(this.value == '{{$partner_state_id}}'){
                        $("#partner_state_id").val(this.value).change();
                    }
                });

                AIZ.plugins.bootstrapSelect('refresh');
            });
    }

    $('#partner_country_id').on('change', function() {
        get_states_by_country_for_partner();
    });

    //  education Add edit , status change
    function education_add_modal(id){
       $.post('{{ route('education.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function education_edit_modal(id){
        $.post('{{ route('education.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_education_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('education.update_education_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }


    //  Career Add edit , status change
    function career_add_modal(id){
       $.post('{{ route('career.create') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
           $('.create_edit_modal_content').html(data);
           $('.create_edit_modal').modal('show');
       });
    }

    function career_edit_modal(id){
        $.post('{{ route('career.edit') }}',{_token:'{{ @csrf_token() }}', id:id}, function(data){
            $('.create_edit_modal_content').html(data);
            $('.create_edit_modal').modal('show');
        });
    }

    function update_career_present_status(el) {
        if (el.checked) {
            var status = 1;
        } else {
            var status = 0;
        }
        $.post('{{ route('career.update_career_present_status') }}', {
            _token: '{{ csrf_token() }}',
            id: el.value,
            status: status
        }, function (data) {
            if (data == 1) {
                location.reload();
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }

    $('.new-email-verification').on('click', function() {
        $(this).find('.loading').removeClass('d-none');
        $(this).find('.default').addClass('d-none');
        var email = $("input[name=email]").val();

        $.post('{{ route('user.new.verify') }}', {_token:'{{ csrf_token() }}', email: email}, function(data){
            data = JSON.parse(data);
            $('.default').removeClass('d-none');
            $('.loading').addClass('d-none');
            if(data.status == 2)
                AIZ.plugins.notify('warning', data.message);
            else if(data.status == 1)
                AIZ.plugins.notify('success', data.message);
            else
                AIZ.plugins.notify('danger', data.message);
        });
    });
    
    $('#partner_state_id').on('change', function() {
    	    get_cities_by_state_for_partner_expectation();
    	});
    	
    // function get_cities_by_state_for_partner_expectation (){
    //     var partner_state_id = $('#partner_state_id').val();
    //         $.post('{{ route('cities.get_cities_by_state') }}',{_token:'{{ csrf_token() }}', state_id:partner_state_id}, function(data){
    //             $('#partner_city_id').html(null);
    //             for (var i = 0; i < data.length; i++) {
    //                 $('#partner_city_id').append($('<option>', {
    //                     value: data[i].id,
    //                     text: data[i].name
    //                 }));
    //             }
    //             $("#partner_city_id > option").each(function() {
    //                 if(this.value == '{{$partner_city_id}}'){
    //                     $("#partner_city_id").val(this.value).change();
    //                 }
    //             });

    //             AIZ.plugins.bootstrapSelect('refresh');
    //         });
    // }
    
    function get_cities_by_state_for_partner_expectation (){
        var partner_state_id = $('#partner_state_id').val();
        $.post('{{ route('cities.get_cities_by_state') }}', {
            _token: '{{ csrf_token() }}', 
            state_id: partner_state_id
        }, function(data){
            $('#partner_city_id').html(null);
            
            // Populate the dropdown with options
            for (var i = 0; i < data.length; i++) {
                $('#partner_city_id').append($('<option>', {
                    value: data[i].id,
                    text: data[i].name
                }));
            }
            
            // Select the cities that are in $partner_city_id
            let selectedCities = @json($partner_city_id);
            $("#partner_city_id > option").each(function() {
                if(selectedCities.includes(this.value)){
                    $(this).prop('selected', true);
                }
            });
    
            // Refresh the selectpicker to reflect the changes
            AIZ.plugins.bootstrapSelect('refresh');
        });
    }

    let selectedCities = @json($partner_city_id); // Pass PHP array to JS
    $("#partner_city_id > option").each(function() {
        if(selectedCities.includes(this.value)){
            $(this).prop('selected', true);
        }
    });

    $(document).ready(function() {
        var uploaderContainer = $('#profile-photo-uploader-container');
        var fileInput = $('#profile-photo-file-input');
        var hiddenInput = $('#profile-photo-hidden-input');
        var previewContainer = $('#profile-photo-preview-container');
        var fileAmount = uploaderContainer.find('.file-amount');

        if (uploaderContainer.length > 0) {
            uploaderContainer.on('click', function() {
                fileInput.trigger('click');
            });

            fileInput.on('change', function() {
                if (this.files && this.files[0]) {
                    uploadProfilePhoto(this.files[0]);
                }
            });
            
            // Handle existing image on page load
            var existingPhotoId = hiddenInput.val();
            if (existingPhotoId) {
                loadExistingPhotoPreview(existingPhotoId);
            }
        }

        function uploadProfilePhoto(file) {
            // Set loading state
            fileAmount.text('{{ translate("Uploading...") }}');
            uploaderContainer.css('pointer-events', 'none');
            previewContainer.html('<div class="text-center py-2"><div class="spinner-border spinner-border-sm text-primary" role="status"></div></div>');

            var formData = new FormData();
            formData.append('photo_file', file);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '{{ route("member.profile_photo_upload") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        hiddenInput.val(response.id);
                        fileAmount.text('1 {{ translate("File selected") }}');
                        renderPreview(response.id, response.url, response.file_original_name, response.extension, response.file_size);
                        AIZ.plugins.notify('success', response.message || '{{ translate("Image uploaded successfully.") }}');
                    } else {
                        resetUploader();
                        AIZ.plugins.notify('danger', response.message || '{{ translate("Upload failed.") }}');
                    }
                },
                error: function(xhr) {
                    resetUploader();
                    var errorMsg = '{{ translate("Something went wrong. Please try again.") }}';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    AIZ.plugins.notify('danger', errorMsg);
                },
                complete: function() {
                    uploaderContainer.css('pointer-events', 'auto');
                    fileInput.val('');
                }
            });
        }

        function loadExistingPhotoPreview(photoId) {
            $.ajax({
                url: AIZ.data.appUrl + '/aiz-uploader/get_file_by_ids',
                type: 'POST',
                data: {
                    _token: AIZ.data.csrf,
                    ids: photoId
                },
                success: function(data) {
                    if (data && data.length > 0) {
                        var file = data[0];
                        var fileUrl = AIZ.data.fileBaseUrl + file.file_name;
                        fileAmount.text('1 {{ translate("File selected") }}');
                        renderPreview(file.id, fileUrl, file.file_original_name, file.extension, file.file_size);
                    } else {
                        fileAmount.text('{{ translate("Choose File") }}');
                    }
                },
                error: function() {
                    fileAmount.text('{{ translate("Choose File") }}');
                }
            });
        }

        function renderPreview(id, url, originalName, extension, size) {
            var sizeStr = AIZ.extra.bytesToSize ? AIZ.extra.bytesToSize(size) : (size / 1024).toFixed(2) + ' KB';
            
            var html = 
                '<div class="d-flex justify-content-between align-items-center mt-2 file-preview-item" data-id="' + id + '" title="' + originalName + '.' + extension + '">' +
                    '<div class="align-items-center align-self-stretch d-flex justify-content-center thumb">' +
                        '<img src="' + url + '" class="img-fit">' +
                    '</div>' +
                    '<div class="col body">' +
                        '<h6 class="d-flex">' +
                            '<span class="text-truncate title">' + originalName + '</span>' +
                            '<span class="ext">.' + extension + '</span>' +
                        '</h6>' +
                        '<p>' + sizeStr + '</p>' +
                    '</div>' +
                    '<div class="remove">' +
                        '<button class="btn btn-sm btn-link remove-profile-photo" type="button">' +
                            '<i class="la la-close"></i>' +
                        '</button>' +
                    '</div>' +
                '</div>';
            
            previewContainer.html(html);
        }

        // Handle attachment deletion
        $(document).on('click', '.remove-profile-photo', function(e) {
            e.stopPropagation();
            resetUploader();
        });

        function resetUploader() {
            hiddenInput.val('');
            fileAmount.text('{{ translate("Choose File") }}');
            previewContainer.html('');
            fileInput.val('');
        }
    });
</script>
@endsection
