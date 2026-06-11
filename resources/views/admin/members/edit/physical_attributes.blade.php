<div class="card-header bg-dark text-white">
    <h5 class="mb-0 h6">{{translate('Physical Attributes')}}</h5>
</div>
<div class="card-body">
    <form action="{{ route('physical-attribute.update', $member->id) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">
        @csrf
        <div class="form-group row">
            <!--<div class="col-md-6">-->
            <!--    <label for="height">{{translate('Height')}}</label>-->
            <!--    <input type="number" name="height" value="{{ $member->physical_attributes->height ?? "" }}" step="any" class="form-control" placeholder="{{translate('Height')}}" required>-->
            <!--    @error('height')-->
            <!--        <small class="form-text text-danger">{{ $message }}</small>-->
            <!--    @enderror-->
            <!--</div>-->
             <div class="col-md-6">

            <label for="height">{{ translate('Height') }} ({{ translate('In cm / Feet') }})</label>

                    <select id="height" name="height" class="form-control" required>
                        <option value="" disabled {{ is_null($member->physical_attributes->height ?? null) ? 'selected' : '' }}>
                            {{ translate('Select Height') }}
                        </option>
                        @for ($i = 140; $i <= 200; $i++)
                            @php
                                // Convert height from cm to feet and inches
                                $feet = floor($i / 30.48);
                                $inches = round(($i / 2.54) - ($feet * 12));
                                $heightInFeetInches = $feet . "'" . ($inches ? $inches : 0) . "\"";
                            @endphp
                            <option value="{{ $i }}" {{ isset($member->physical_attributes) && $member->physical_attributes->height == $i ? 'selected' : '' }}>
                                {{ $i }} cm ({{ $heightInFeetInches }})
                            </option>
                        @endfor
                    </select>


        
        @error('height')
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
            <!--<div class="col-md-6">-->
            <!--    <label for="weight">{{translate('Weight')}}</label>-->
            <!--    <input type="text" name="weight" value="{{ $member->physical_attributes->weight ?? "" }}" placeholder="{{ translate('Weight') }}" step="any" class="form-control" required>-->
            <!--    @error('weight')-->
            <!--        <small class="form-text text-danger">{{ $message }}</small>-->
            <!--    @enderror-->
            <!--</div>-->
            <div class="col-md-6">
                 
                <label for="weight">{{translate('Weight')}} ({{ translate('In Kg') }})</label>
                 <select id="weight" name="weight" class="form-control" required>
                        <option value="" disabled {{ is_null($member->physical_attributes->weight ?? null) ? 'selected' : '' }}>
                            {{ translate('Select Weight') }}
                        </option>
                        @for ($i = 40; $i <= 140; $i++)
                        <option value="{{ $i }}" {{ isset($member->physical_attributes) && $member->physical_attributes->weight == $i ? 'selected' : '' }}>
                        {{ $i }} kg
                        </option>
                        @endfor
                </select>

                  @error('weight')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
        </div>

        <div class="form-group row">
            <!--<div class="col-md-6">-->
            <!--    <label for="eye_color">{{translate('Eye color')}}</label>-->
            <!--    <input type="text" name="eye_color" value="{{ $member->physical_attributes->eye_color ?? "" }}" class="form-control" placeholder="{{translate('Eye Color')}}" required>-->
            <!--    @error('eye_color')-->
            <!--        <small class="form-text text-danger">{{ $message }}</small>-->
            <!--    @enderror-->
            <!--</div>-->
            
            <!--<div class="col-md-6">-->
            <!--    <label for="hair_color">{{translate('Hair Color')}}</label>-->
            <!--    <input type="text" name="hair_color" value="{{ $member->physical_attributes->hair_color ?? "" }}" placeholder="{{ translate('Hair Color') }}" class="form-control" required>-->
            <!--    @error('hair_color')-->
            <!--        <small class="form-text text-danger">{{ $message }}</small>-->
            <!--    @enderror-->
            <!--</div>-->
            
            <div class="col-md-6">
                 <label for="eye_color">{{translate('Skin Color')}}</label>
                 <!--<input type="text" name="eye_color" value="{{ $member->physical_attributes->eye_color ?? "" }}" class="form-control" placeholder="{{translate('Eye Color')}}" required>-->
                
                    <select id="eye_color" name="eye_color" class="form-control" required>
                        <option value="" disabled {{ isset($member->physical_attributes->eye_color) ? 'selected' : '' }}>
                            {{ translate('Select Skin Color') }}
                        </option>
                        
                        <option value="Very fair" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Very fair' ? 'selected' : '' }}>Very fair</option>
                        <option value="Fair" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Fair' ? 'selected' : '' }}>Fair</option>
                        <option value="Light Wheatish" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Light Wheatish' ? 'selected' : '' }}>Light Wheatish</option>
                        <option value="Wheatish" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Wheatish' ? 'selected' : '' }}>Wheatish</option>
                        <option value="Tan" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Tan' ? 'selected' : '' }}>Tan</option>
                        <option value="Dusky" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Dusky' ? 'selected' : '' }}>Dusky</option>
                        <option value="Brown" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Brown' ? 'selected' : '' }}>Brown</option>
                        <option value="Dark Brown" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Dark Brown' ? 'selected' : '' }}>Dark Brown</option>
                        <option value="Prefer not to say" {{ isset($member->physical_attributes) && $member->physical_attributes->eye_color == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                    </select>


                  @error('eye_color')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
                  
              </div>
              
               <div class="col-md-6">
                    <label for="body_type">{{translate('Body Type')}}</label>
                
                    <select id="body_type" name="body_type" class="form-control" required>
                        <option value="" disabled {{ is_null($member->physical_attributes->body_type ?? null) ? 'selected' : '' }}>
                            {{ translate('Select Body Type') }}
                        </option>
                        <option value="Slim" {{ isset($member->physical_attributes) && $member->physical_attributes->body_type == 'Slim' ? 'selected' : '' }}>Slim</option>
                        <option value="Average" {{ isset($member->physical_attributes) && $member->physical_attributes->body_type == 'Average' ? 'selected' : '' }}>Average</option>
                        <option value="Athletic" {{ isset($member->physical_attributes) && $member->physical_attributes->body_type == 'Athletic' ? 'selected' : '' }}>Athletic</option>
                        <option value="Heavy" {{ isset($member->physical_attributes) && $member->physical_attributes->body_type == 'Heavy' ? 'selected' : '' }}>Heavy</option>
                    </select>

                  @error('body_type')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
        </div>

        <div class="form-group row">
             
              <div class="col-md-6">
                  <label for="blood_group">{{translate('Blood Group')}}</label>
                    
                   <select id="blood_group" name="blood_group" class="form-control" required>
                        <option value="" disabled {{ is_null($member->physical_attributes->blood_group ?? null) ? 'selected' : '' }}>
                            {{ translate('Select Blood Group') }}
                        </option>
                        <option value="A+" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                        <option value="A-" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                        <option value="B+" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                        <option value="B-" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                        <option value="AB+" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                        <option value="AB-" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                        <option value="O+" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                        <option value="O-" {{ isset($member->physical_attributes) && $member->physical_attributes->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                    </select>
                  
                  @error('blood_group')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
              
               <div class="col-md-6">
                  <label for="disability">{{translate('Disability')}}</label>
                  <input type="text" name="disability" value="{{ $member->physical_attributes->disability ?? "" }}" class="form-control" placeholder="{{translate('Disability')}}">
                  @error('disability')
                      <small class="form-text text-danger">{{ $message }}</small>
                  @enderror
              </div>
          </div>

        <!--<div class="form-group row">-->
        <!--    <div class="col-md-6">-->
        <!--        <label for="body_type">{{translate('Body Type')}}</label>-->
        <!--        <input type="text" name="body_type" value="{{ $member->physical_attributes->body_type ?? "" }}" class="form-control" placeholder="{{translate('Body Type')}}" required>-->
        <!--        @error('body_type')-->
        <!--            <small class="form-text text-danger">{{ $message }}</small>-->
        <!--        @enderror-->
        <!--    </div>-->
        <!--    <div class="col-md-6">-->
        <!--        <label for="body_art">{{translate('Body Art')}}</label>-->
        <!--        <input type="text" name="body_art" value="{{ $member->physical_attributes->body_art ?? "" }}" placeholder="{{ translate('Body Art') }}" class="form-control" required>-->
        <!--        @error('body_art')-->
        <!--            <small class="form-text text-danger">{{ $message }}</small>-->
        <!--        @enderror-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="form-group row">-->
        <!--    <div class="col-md-6">-->
        <!--        <label for="complexion">{{translate('Complexion')}}</label>-->
        <!--        <input type="text" name="complexion" value="{{ $member->physical_attributes->complexion ?? "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>-->
        <!--        @error('complexion')-->
        <!--            <small class="form-text text-danger">{{ $message }}</small>-->
        <!--        @enderror-->
        <!--    </div>-->
        <!--</div>-->

        <div class="text-right">
            <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
        </div>
    </form>
</div>
