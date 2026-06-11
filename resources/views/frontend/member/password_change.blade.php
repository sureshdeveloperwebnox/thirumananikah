@extends('frontend.layouts.member_panel')
@section('panel_content')
    <div class="card">
      <div class="card-header">
          <h5 class="mb-0 h6">{{ translate('Change Password') }}</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('member.password_update', Auth::user()->id) }}" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-md-3 col-form-label">{{translate('Old Password')}}<span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="password" name="old_password" id="old_password" class="form-control" placeholder="{{translate('Old Password')}}" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="las la-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    @error('old_password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">{{translate('Password')}}<span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="password" name="password" id="new_password" class="form-control" placeholder="{{translate('Password')}}" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="las la-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">{{translate('Confirm Password')}}<span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="password" class="form-control" name="confirm_password" onkeyup="checkPasswordValidation(123)" id="confirm_password" placeholder="{{translate('Confirm Password')}}" required>
                        <div class="input-group-append">
                            <span class="input-group-text toggle-password" style="cursor: pointer;">
                                <i class="las la-eye-slash"></i>
                            </span>
                        </div>
                    </div>
                    <small id="confirm_password_help" class="form-text text-muted" style="color: red; display: none;">{{ translate('Mismatch Password.') }}</small>
                    @error('confirm_password')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
              <div class="form-group row text-right">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-primary" id="passSaveBtn" disabled>{{translate('Confirm')}}</button>
                  </div>
              </div>
          </form>
      </div>
    </div>
@endsection

@section('script')
<script type="text/javascript">

	function checkPasswordValidation(confirm_password) {
        var new_password = $('#new_password').val();
        var confirm_password = $('#confirm_password').val();
        $('#confirm_password_help').show();
        if(new_password === confirm_password) {
            $('#confirm_password_help').text('Password Matched');
            $('#passSaveBtn').prop("disabled", false);
        }else {
            $('#confirm_password_help').text('Mismatched Password');
            $('#passSaveBtn').prop("disabled", true);
        }
    }

    $(document).ready(function() {
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
    });
</script>
@endsection
