<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Partner Expectation')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('partner_expectations.update', $member->id) }}" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="general">{{translate('General Requirement')}}</label>
                    <!--<input type="text" name="general" value="{{ $member->partner_expectations->general ?? "" }}" class="form-control" placeholder="{{translate('General')}}" required>-->
                
                <textarea name="general" class="form-control" placeholder="{{translate('General')}}" required rows="5">{{ $member->partner_expectations->general ?? "" }}</textarea>

                
                </div>
                
                 <div class="col-md-6">
                    <label for="partner_city_id">{{translate('Preferred City')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_city_id" id="partner_city_id" data-live-search="true">

                    </select>
                    @error('partner_city_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                <!--<div class="col-md-6">-->
                <!--    <label for="residence_country_id">{{translate('Preffered Location')}}</label>-->
                <!--    <select class="form-control aiz-selectpicker" name="residence_country_id" data-selected="{{ $member->partner_expectations->residence_country_id ?? "" }}" data-live-search="true" required>-->
                <!--        @foreach ($countries as $country)-->
                <!--            <option value="{{$country->id}}">{{$country->name}}</option>-->
                <!--        @endforeach-->
                <!--    </select>-->
                <!--    @error('residence_country_id')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_min_age">{{translate('Min Age')}}</label>
                    <input type="number" name="partner_min_age" value="{{ $member->partner_expectations->partner_min_age ?? "" }}" step="any"  placeholder="{{ translate('Min Age') }}" class="form-control" required>
                    @error('partner_min_age')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_max_age">{{translate('Max Age')}}</label>
                    <input type="number" name="partner_max_age" value="{{ $member->partner_expectations->partner_max_age ?? "" }}" step="any" class="form-control" placeholder="{{translate('Max Age')}}" required>
                    @error('partner_max_age')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_height">{{translate('Height')}}  ({{ translate('cm / Feet') }})</label>
                    <!--<input type="number" name="partner_height" value="{{ $member->partner_expectations->height ?? "" }}" step="any"  placeholder="{{ translate('Height') }}" class="form-control" required>-->
                    
                     <select id="partner_height" name="partner_height" class="form-control" required>
    @for ($i = 140; $i <= 200; $i++)
        @php
            // Convert the height in cm to feet and inches
            $feet = floor($i / 30.48);
            $inches = round(($i / 2.54) - ($feet * 12), 0);
            $heightInFeetInches = $feet . "'" . ($inches ? $inches : 0) . "\"";
        @endphp
        <option value="{{ $i }}" {{ isset($member->physical_attributes) && $member->partner_expectations->height == $i ? 'selected' : '' }}>
            {{ $i }} cm ({{ $heightInFeetInches }})
        </option>
    @endfor
</select>
                    
                    @error('partner_height')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_weight">{{translate('Weight')}}  ({{ translate('In Kg') }})</label>
                    <!--<input type="number" name="partner_weight" value="{{ $member->partner_expectations->weight ?? "" }}" step="any" class="form-control" placeholder="{{translate('Weight')}}" required>-->
                    
                    <select id="partner_weight" name="partner_weight" class="form-control" required>
                        @for ($i = 40; $i <= 140; $i++)
                            <option value="{{ $i }}" {{ isset($member->partner_expectations) && $member->partner_expectations->weight == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    
                    @error('partner_weight')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <!--<label for="partner_marital_status">{{translate('Marital Status')}}</label>-->
                     <label for="partner_marital_status">Marital Status</label>
                    <select class="form-control aiz-selectpicker" name="partner_marital_status" data-selected="{{ $member->partner_expectations->marital_status_id ?? "" }}" data-live-search="true" required>
                        <option value="">{{ translate('Choose One') }}</option>
                        @foreach ($marital_statuses as $marital_status)
                        <option value="{{$marital_status->id}}">{{$marital_status->name}}</option>
                        @endforeach
                    </select>
                    @error('partner_marital_status')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="partner_children_acceptable">{{translate('Children Acceptable')}}</label>
                    @php $children_acceptable = !empty($member->partner_expectations->children_acceptable) ? $member->partner_expectations->children_acceptable : ""; @endphp
                    <select class="form-control aiz-selectpicker" name="partner_children_acceptable" required>
                        <option value="">{{ translate('Choose One') }}</option>
                        <option value="yes" @if($children_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>
                        <option value="no" @if($children_acceptable ==  'no') selected @endif >{{translate('No')}}</option>
                        <option value="dose_not_matter" @if($children_acceptable ==  'dose_not_matter') selected @endif >{{translate('Does not matter')}}</option>
                    </select>
                    @error('partner_children_acceptable')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_religion_id">{{translate('Religion')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_religion_id" id="partner_religion_id" data-selected="{{ $partner_religion_id }}" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($religions as $religion)
                            <option value="{{$religion->id}}"> {{ $religion->name }} </option>
                        @endforeach
                    </select>
                    @error('partner_religion_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_caste_id">{{translate('Sect')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_caste_id" id="partner_caste_id" data-live-search="true">

                    </select>
                    @error('partner_caste_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_sub_caste_id">{{translate('Sub Sect')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_sub_caste_id" id="partner_sub_caste_id" data-live-search="true">

                    </select>
                
                   <!--<input type="text" class="form-control" name="partner_sub_caste_id" id="partner_sub_caste_id" />-->

                
                </div>
                <div class="col-md-6">
                    <label for="language_id">{{translate('Language')}}</label>
                    <select class="form-control aiz-selectpicker" name="language_id" data-selected="{{ $member->partner_expectations->language_id ?? "" }}" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($languages as $language)
                            <option value="{{$language->id}}"> {{ $language->name }} </option>
                        @endforeach
                    </select>
                    @error('language_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="pertner_education">{{translate('Education')}}</label>
                    <!--<input type="text" name="pertner_education" value="{{ $member->partner_expectations->education ?? "" }}" class="form-control" placeholder="{{translate('Education')}}">-->
                     <!--<label for="pertner_education">{{ translate('Education') }}</label>-->
                        <select id="pertner_education" name="pertner_education" class="form-control" required>
    <option value="" disabled {{ isset($member->partner_expectations) && $member->partner_expectations->education ? 'selected' : '' }}>{{ translate('Select Education') }}</option>
    <option value="Science" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Science' ? 'selected' : '' }}>Science</option>
    <option value="Agriculture" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
    <option value="Mass Communication" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Mass Communication' ? 'selected' : '' }}>Mass Communication</option>
    <option value="Dphram" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Dphram' ? 'selected' : '' }}>Dphram</option>
    <option value="Draftman" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Draftman' ? 'selected' : '' }}>Draftman</option>
    <option value="Religious Education" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Religious Education' ? 'selected' : '' }}>Religious Education</option>
    <option value="Other Education" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Other Education' ? 'selected' : '' }}>Other Education</option>
    <option value="Medicine - Other" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Medicine - Other' ? 'selected' : '' }}>Medicine - Other</option>
    <option value="Administrative Services" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Administrative Services' ? 'selected' : '' }}>Administrative Services</option>
    <option value="Social Works" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Social Works' ? 'selected' : '' }}>Social Works</option>
    <option value="Philosophy" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Philosophy' ? 'selected' : '' }}>Philosophy</option>
    <option value="Aeronautical Engineering" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Aeronautical Engineering' ? 'selected' : '' }}>Aeronautical Engineering</option>
    <option value="Fine Arts" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Fine Arts' ? 'selected' : '' }}>Fine Arts</option>
    <option value="Travel & Tourism" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Travel & Tourism' ? 'selected' : '' }}>Travel & Tourism</option>
    <option value="Shipping" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Shipping' ? 'selected' : '' }}>Shipping</option>
    <option value="Advertising/Marketing" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Advertising/Marketing' ? 'selected' : '' }}>Advertising/Marketing</option>
    <option value="Office Administration" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Office Administration' ? 'selected' : '' }}>Office Administration</option>
    <option value="Paramedical" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Paramedical' ? 'selected' : '' }}>Paramedical</option>
    <option value="Nursing" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Nursing' ? 'selected' : '' }}>Nursing</option>
    <option value="Medicine - Allopathic" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Medicine - Allopathic' ? 'selected' : '' }}>Medicine - Allopathic</option>
    <option value="Law" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Law' ? 'selected' : '' }}>Law</option>
    <option value="Home Science" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Home Science' ? 'selected' : '' }}>Home Science</option>
    <option value="Finance" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Finance' ? 'selected' : '' }}>Finance</option>
    <option value="Fashion" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Fashion' ? 'selected' : '' }}>Fashion</option>
    <option value="Education" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Education' ? 'selected' : '' }}>Education</option>
    <option value="Computers/ IT" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Computers/ IT' ? 'selected' : '' }}>Computers/ IT</option>
    <option value="Commerce" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Commerce' ? 'selected' : '' }}>Commerce</option>
    <option value="Arts" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Arts' ? 'selected' : '' }}>Arts</option>
    <option value="Armed Forces" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Armed Forces' ? 'selected' : '' }}>Armed Forces</option>
    <option value="Architecture" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Architecture' ? 'selected' : '' }}>Architecture</option>
    <option value="Administration/ Management" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Administration/ Management' ? 'selected' : '' }}>Administration/ Management</option>
    <option value="Engineering/Technology" {{ isset($member->partner_expectations) && $member->partner_expectations->education == 'Engineering/Technology' ? 'selected' : '' }}>Engineering/Technology</option>
</select>


                    
                    @error('pertner_education')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <!--<label for="partner_profession">{{translate('Profession')}}</label>-->
                    <!--<input type="text" name="partner_profession" value="{{ $member->partner_expectations->profession ?? "" }}" class="form-control" placeholder="{{translate('Profession')}}">-->
                    
                    <label for="partner_profession">{{ translate('Profession') }}</label>
                    <select id="partner_profession" name="partner_profession" class="form-control" required>
                        <option value="" disabled {{ isset($member->partner_expectations->profession) ? 'selected' : '' }}>{{ translate('Select Profession') }}</option>
                        <option value="Not working" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Not working' ? 'selected' : '' }}>Not working</option>
                        <option value="Student" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="Non-mainstream professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Non-mainstream professional' ? 'selected' : '' }}>Non-mainstream professional</option>
                        <option value="Accountant" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                        <option value="Acting Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Acting Professional' ? 'selected' : '' }}>Acting Professional</option>
                        <option value="Actor" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Actor' ? 'selected' : '' }}>Actor</option>
                        <option value="Administration Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Administration Professional' ? 'selected' : '' }}>Administration Professional</option>
                        <option value="Advertising Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Advertising Professional' ? 'selected' : '' }}>Advertising Professional</option>
                        <option value="Air Hostess" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Air Hostess' ? 'selected' : '' }}>Air Hostess</option>
                        <option value="Airline Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Airline Professional' ? 'selected' : '' }}>Airline Professional</option>
                        <option value="Architect" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Architect' ? 'selected' : '' }}>Architect</option>
                        <option value="Artist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Artist' ? 'selected' : '' }}>Artist</option>
                        <option value="Audiologist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Audiologist' ? 'selected' : '' }}>Audiologist</option>
                        <option value="Bank Officer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Bank Officer' ? 'selected' : '' }}>Bank Officer</option>
                        <option value="Beautician" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Beautician' ? 'selected' : '' }}>Beautician</option>
                        <option value="Biologist / Botanist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Biologist / Botanist' ? 'selected' : '' }}>Biologist / Botanist</option>
                        <option value="Business Person" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Business Person' ? 'selected' : '' }}>Business Person</option>
                        <option value="Chartered Accountant" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Chartered Accountant' ? 'selected' : '' }}>Chartered Accountant</option>
                        <option value="Civil Engineer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Civil Engineer' ? 'selected' : '' }}>Civil Engineer</option>
                        <option value="Clerical Official" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Clerical Official' ? 'selected' : '' }}>Clerical Official</option>
                        <option value="Commercial Pilot" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Commercial Pilot' ? 'selected' : '' }}>Commercial Pilot</option>
                        <option value="Company Secretary" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Company Secretary' ? 'selected' : '' }}>Company Secretary</option>
                        <option value="Computer Engineer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Computer Engineer' ? 'selected' : '' }}>Computer Engineer</option>
                        <option value="Consultant" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Consultant' ? 'selected' : '' }}>Consultant</option>
                        <option value="Contractor" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Contractor' ? 'selected' : '' }}>Contractor</option>
                        <option value="Cost Accountant" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Cost Accountant' ? 'selected' : '' }}>Cost Accountant</option>
                        <option value="Creative Person" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Creative Person' ? 'selected' : '' }}>Creative Person</option>
                        <option value="Customer Support Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Customer Support Professional' ? 'selected' : '' }}>Customer Support Professional</option>
                        <option value="Defence Employee" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Defence Employee' ? 'selected' : '' }}>Defence Employee</option>
                        <option value="Dentist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Dentist' ? 'selected' : '' }}>Dentist</option>
                        <option value="Designer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Designer' ? 'selected' : '' }}>Designer</option>
                        <option value="Doctor" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Doctor' ? 'selected' : '' }}>Doctor</option>
                        <option value="Economist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Economist' ? 'selected' : '' }}>Economist</option>
                        <option value="Engineer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Engineer' ? 'selected' : '' }}>Engineer</option>
                        <option value="Engineer (Mechanical)" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Engineer (Mechanical)' ? 'selected' : '' }}>Engineer (Mechanical)</option>
                        <option value="Engineer (Project)" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Engineer (Project)' ? 'selected' : '' }}>Engineer (Project)</option>
                        <option value="Entertainment Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Entertainment Professional' ? 'selected' : '' }}>Entertainment Professional</option>
                        <option value="Event Manager" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Event Manager' ? 'selected' : '' }}>Event Manager</option>
                        <option value="Executive" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Executive' ? 'selected' : '' }}>Executive</option>
                        <option value="Factory worker" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Factory worker' ? 'selected' : '' }}>Factory worker</option>
                        <option value="Farmer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Farmer' ? 'selected' : '' }}>Farmer</option>
                        <option value="Fashion Designer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Fashion Designer' ? 'selected' : '' }}>Fashion Designer</option>
                        <option value="Finance Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Finance Professional' ? 'selected' : '' }}>Finance Professional</option>
                        <option value="Flight Attendant" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Flight Attendant' ? 'selected' : '' }}>Flight Attendant</option>
                        <option value="Government Employee" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Government Employee' ? 'selected' : '' }}>Government Employee</option>
                        <option value="Graphic Designer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                        <option value="HR Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'HR Professional' ? 'selected' : '' }}>HR Professional</option>
                        <option value="Insurance Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Insurance Professional' ? 'selected' : '' }}>Insurance Professional</option>
                        <option value="Interior Designer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Interior Designer' ? 'selected' : '' }}>Interior Designer</option>
                        <option value="Journalist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Journalist' ? 'selected' : '' }}>Journalist</option>
                        <option value="Lawyer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Lawyer' ? 'selected' : '' }}>Lawyer</option>
                        <option value="Marketing Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Marketing Professional' ? 'selected' : '' }}>Marketing Professional</option>
                        <option value="Media Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Media Professional' ? 'selected' : '' }}>Media Professional</option>
                        <option value="Medical Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Medical Professional' ? 'selected' : '' }}>Medical Professional</option>
                        <option value="Nurse" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Nurse' ? 'selected' : '' }}>Nurse</option>
                        <option value="Pharmacist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                        <option value="Pilot" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Pilot' ? 'selected' : '' }}>Pilot</option>
                        <option value="Professor" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Professor' ? 'selected' : '' }}>Professor</option>
                        <option value="Researcher" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Researcher' ? 'selected' : '' }}>Researcher</option>
                        <option value="Sales Professional" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Sales Professional' ? 'selected' : '' }}>Sales Professional</option>
                        <option value="Scientist" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Scientist' ? 'selected' : '' }}>Scientist</option>
                        <option value="Software Engineer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Software Engineer' ? 'selected' : '' }}>Software Engineer</option>
                        <option value="Teacher" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="Technician" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Technician' ? 'selected' : '' }}>Technician</option>
                        <option value="Trainer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Trainer' ? 'selected' : '' }}>Trainer</option>
                        <option value="Web Developer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
                        <option value="Writer" {{ isset($member->partner_expectations) && $member->partner_expectations->profession == 'Writer' ? 'selected' : '' }}>Writer</option>
                    </select>

                    
                    @error('partner_profession')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!--<div class="form-group row">-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="smoking_acceptable">{{translate('Smoking Acceptable')}}</label>-->
            <!--        @php $partner_smoking_acceptable = !empty($member->partner_expectations->smoking_acceptable) ? $member->partner_expectations->smoking_acceptable : ""; @endphp-->
            <!--        <select class="form-control aiz-selectpicker" name="smoking_acceptable" required>-->
            <!--            <option value="yes" @if($partner_smoking_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>-->
            <!--            <option value="no" @if($partner_smoking_acceptable ==  'no') selected @endif >{{translate('No')}}</option>-->
            <!--            <option value="dose_not_matter" @if($partner_smoking_acceptable ==  'dose_not_matter') selected @endif >{{translate('Does not matter')}}</option>-->
            <!--        </select>-->
            <!--        @error('smoking_acceptable')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="drinking_acceptable">{{translate('Drinking Acceptable')}}</label>-->
            <!--        @php $partner_drinking_acceptable = !empty($member->partner_expectations->drinking_acceptable) ? $member->partner_expectations->drinking_acceptable : ""; @endphp-->
            <!--        <select class="form-control aiz-selectpicker" name="drinking_acceptable" required>-->
            <!--            <option value="yes" @if($partner_drinking_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>-->
            <!--            <option value="no" @if($partner_drinking_acceptable ==  'no') selected @endif >{{translate('No')}}</option>-->
            <!--            <option value="dose_not_matter" @if($partner_drinking_acceptable ==  'dose_not_matter') selected @endif >{{translate('Does not matter')}}</option>-->
            <!--        </select>-->
            <!--        @error('drinking_acceptable')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--</div>-->

            <div class="form-group row">
                <!--<div class="col-md-6">-->
                <!--    <label for="partner_diet">{{translate('Dieting Acceptable')}}</label>-->
                <!--    @php $partner_dieting_acceptable = !empty($member->partner_expectations->diet) ? $member->partner_expectations->diet : ""; @endphp-->
                <!--    <select class="form-control aiz-selectpicker" name="partner_diet" required>-->
                <!--        <option value="yes" @if($partner_dieting_acceptable ==  'yes') selected @endif >{{translate('Yes')}}</option>-->
                <!--        <option value="no" @if($partner_dieting_acceptable ==  'no') selected @endif >{{translate('No')}}</option>-->
                <!--        <option value="dose_not_matter" @if($partner_dieting_acceptable ==  'dose_not_matter') selected @endif >{{translate('Does not matter')}}</option>-->
                <!--    </select>-->
                <!--    @error('partner_diet')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
                
                
                <div class="col-md-6">
                    <label for="pertner_complexion">{{translate('Skin color')}}</label>
                    <!--<input type="text" name="pertner_complexion" value="{{ $member->partner_expectations->complexion ?? "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>-->
                    
                     <select id="pertner_complexion" name="pertner_complexion" class="form-control" required>
                        <option value="" disabled {{ isset($member->partner_expectations->pertner_complexion) ? 'selected' : '' }}>{{ translate('Select Skin color') }}</option>
                        <option value="Very fair" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Very fair' ? 'selected' : '' }}>Very fair</option>
                        <option value="Fair" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Fair' ? 'selected' : '' }}>Fair</option>
                        <option value="Light Wheatish" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Light Wheatish' ? 'selected' : '' }}>Light Wheatish</option>
                        <option value="Wheatish" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Wheatish' ? 'selected' : '' }}>Wheatish</option>
                        <option value="Tan" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Tan' ? 'selected' : '' }}>Tan</option>
                        <option value="Dusky" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Dusky' ? 'selected' : '' }}>Dusky</option>
                        <option value="Brown" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Brown' ? 'selected' : '' }}>Brown</option>
                        <option value="Dark Brown" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Dark Brown' ? 'selected' : '' }}>Dark Brown</option>
                        <option value="Prefer not to say" {{ isset($member->partner_expectations) && $member->partner_expectations->complexion == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                    </select>

                    
                    @error('pertner_complexion')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_body_type">{{translate('Body Type')}}</label>
                    <!--<input type="text" name="partner_body_type" value="{{ $member->partner_expectations->body_type ?? "" }}" class="form-control" placeholder="{{translate('Body Type')}}">-->
                    
                <select id="partner_body_type" name="partner_body_type" class="form-control" required>
                    <option value="Slim" {{ isset($member->partner_expectations) && $member->partner_expectations->body_type == 'Slim' ? 'selected' : '' }}>Slim</option>
                    <option value="Average" {{ isset($member->partner_expectations) && $member->partner_expectations->body_type == 'Average' ? 'selected' : '' }}>Average</option>
                    <option value="Athletic" {{ isset($member->partner_expectations) && $member->partner_expectations->body_type == 'Athletic' ? 'selected' : '' }}>Athletic</option>
                    <option value="Heavy" {{ isset($member->partner_expectations) && $member->partner_expectations->body_type == 'Heavy' ? 'selected' : '' }}>Heavy</option>
                </select>
                    
                    @error('partner_body_type')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_personal_value">{{translate('Performing Salah')}}</label>
                    <!--<input type="text" name="partner_personal_value" value="{{ $member->partner_expectations->personal_value ?? "" }}" class="form-control" placeholder="{{translate('Personal Value')}}">-->
                    
                    <select name="partner_personal_value" class="form-control">
    <option value="always" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'always' ? 'selected' : '' }}>
        {{ translate('Always') }}
    </option>
    <option value="sometimes" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'sometimes' ? 'selected' : '' }}>
        {{ translate('Sometimes') }}
    </option>
    <option value="never" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'never' ? 'selected' : '' }}>
        {{ translate('Never') }}
    </option>
    <option value="not_prefer_to_say" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'not prefer to say' ? 'selected' : '' }}>
        {{ translate('Not prefer to say') }}
    </option>
</select>
                    
                    
                    @error('partner_personal_value')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--<div class="col-md-6">-->
                <!--    <label for="partner_manglik">{{translate('Manglik')}}</label>-->
                <!--    @php $partner_manglik = !empty($member->partner_expectations->manglik) ? $member->partner_expectations->manglik : ""; @endphp-->
                <!--    <select class="form-control aiz-selectpicker" name="partner_manglik" required>-->
                <!--        <option value="yes" @if($partner_manglik ==  'yes') selected @endif >{{translate('Yes')}}</option>-->
                <!--        <option value="no" @if($partner_manglik ==  'no') selected @endif >{{translate('No')}}</option>-->
                <!--        <option value="dose_not_matter" @if($partner_manglik ==  'dose_not_matter') selected @endif >{{translate('Does not matter')}}</option>-->
                <!--    </select>-->
                <!--    @error('partner_manglik')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
                <!--<div class="col-md-6">-->
                <!--    <label for="pertner_complexion">{{translate('Complexion')}}</label>-->
                <!--    <input type="text" name="pertner_complexion" value="{{ $member->partner_expectations->complexion ?? "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>-->
                <!--    @error('pertner_complexion')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
                 <div class="col-md-6">
                    <label for="family_value_id">{{translate('Family Value')}}</label>
                    <select class="form-control aiz-selectpicker" name="family_value_id" data-selected="{{ $member->partner_expectations->family_value_id ?? "" }}" >
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($family_values as $family_value)
                            <option value="{{$family_value->id}}"> {{ $family_value->name }} </option>
                        @endforeach
                    </select>
                    @error('family_value_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
               
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="partner_country_id">{{translate('Preferred Country')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_country_id" id="partner_country_id" data-selected="{{ $partner_country_id }}" data-live-search="true" required>
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('partner_country_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="partner_state_id">{{translate('Preferred State')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_state_id" id="partner_state_id" data-live-search="true">

                    </select>
                    @error('partner_state_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                
            
                <div class="col-md-6">
                    <label for="partner_city_id">{{translate('Preferred City')}}</label>
                    <select class="form-control aiz-selectpicker" name="partner_city_id" id="partner_city_id" data-live-search="true">

                    </select>
                    @error('partner_city_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
                
                @php
                $family_status = App\Models\FamilyStatus::all();
                @endphp
                
                <div class="col-md-6">
                    <label for="preferred_family_status_id">{{translate('Family Status')}}</label>
                    <select class="form-control aiz-selectpicker" name="preferred_family_status_id" data-selected="{{ $member->partner_expectations->preferred_family_status_id ?? "" }}" >
                        <option value="">{{translate('Select One')}}</option>
                        @foreach ($family_status as $familyStatus)
                        <option value="{{$familyStatus->id}}"> {{ $familyStatus->name }}</option>
                        @endforeach
                    </select>
                    @error('preferred_family_status_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!--<div class="form-group row">-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="pertner_complexion">{{translate('Skin color')}}</label>-->
            <!--        <input type="text" name="pertner_complexion" value="{{ $member->partner_expectations->complexion ?? "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>-->
                    
            <!--        <select id="pertner_complexion" name="pertner_complexion" class="form-control" required>-->
            <!--        <option value="Very fair" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Very fair' ? 'selected' : '' }}>Very fair</option>-->
            <!--        <option value="Fair" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Fair' ? 'selected' : '' }}>Fair</option>-->
            <!--        <option value="Light Wheatish" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Light Wheatish' ? 'selected' : '' }}>Light Wheatish</option>-->
            <!--        <option value="Wheatish" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Wheatish' ? 'selected' : '' }}>Wheatish</option>-->
            <!--        <option value="Tan" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Tan' ? 'selected' : '' }}>Tan</option>-->
            <!--        <option value="Dusky" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Dusky' ? 'selected' : '' }}>Dusky</option>-->
            <!--        <option value="Brown" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Brown' ? 'selected' : '' }}>Brown</option>-->
            <!--        <option value="Dark Brown" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Dark Brown' ? 'selected' : '' }}>Dark Brown</option>-->
            <!--        <option value="Prefer not to say" {{ isset($member->physical_attributes) && $member->physical_attributes->skin_color == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>-->
            <!--    </select>-->
                    
            <!--        @error('pertner_complexion')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="family_value_id">{{translate('Family Value')}}</label>-->
            <!--        <select class="form-control aiz-selectpicker" name="family_value_id" data-selected="{{ $member->partner_expectations->family_value_id ?? "" }}" >-->
            <!--            <option value="">{{translate('Select One')}}</option>-->
            <!--            @foreach ($family_values as $family_value)-->
            <!--                <option value="{{$family_value->id}}"> {{ $family_value->name }} </option>-->
            <!--            @endforeach-->
            <!--        </select>-->
            <!--        @error('family_value_id')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <label for="pertner_complexion">{{translate('Complexion')}}</label>-->
            <!--        <input type="text" name="pertner_complexion" value="{{ $member->partner_expectations->complexion ?? "" }}" class="form-control" placeholder="{{translate('Complexion')}}" required>-->
            <!--        @error('pertner_complexion')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--</div>-->

            <div class="text-right">
                <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
            </div>
        </form>
    </div>
</div>

