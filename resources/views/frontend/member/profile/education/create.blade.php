<form action="{{ route('education.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Add New Education Info')}}</h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="user_id" value="{{ $member_id }}">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Higher Education')}}</label>
            <div class="col-md-9">
                <!--<input type="text" name="degree" class="form-control" placeholder="{{translate('Degree')}}" required>-->
                <select id="degree" name="degree" class="form-control" required multiple >
                    <option value="Doctorate">Doctorate</option>
                    <option value="Masters">Masters</option>
                    <option value="Bachelors">Bachelors</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Trade School/TTC/ITI">Trade School/TTC/ITI </option>
                    <option value="Islamic Studies">Islamic Studies </option>
                    <option value="High/Secondary School">High/Secondary School</option>
                    <option value="Less than High School">Less than High School </option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Major')}}</label>
            <div class="col-md-9">
                <!--<input type="text" name="institution"  placeholder="{{ translate('Institution') }}" class="form-control" required>-->
      
             <select id="institution" name="institution" class="form-control" required>
                <option value="Science">Science</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Mass Communication">Mass Communication</option>
                <option value="Dphram">Dphram</option>
                <option value="Draftman">Draftman</option>
                <option value="Religious Education">Religious Education</option>
                <option value="Other Education">Other Education</option>
                <option value="Medicine - Other">Medicine - Other</option>
                <option value="Administrative Services">Administrative Services</option>
                <option value="Social Works">Social Works</option>
                <option value="Philosophy">Philosophy</option>
                <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                <option value="Fine Arts">Fine Arts</option>
                <option value="Travel & Tourism">Travel & Tourism</option>
                <option value="Shipping">Shipping</option>
                <option value="Advertising/Marketing">Advertising/Marketing</option>
                <option value="Office Administration">Office Administration</option>
                <option value="Paramedical">Paramedical</option>
                <option value="Nursing">Nursing</option>
                <option value="Medicine - Allopathic">Medicine - Allopathic</option>
                <option value="Law">Law</option>
                <option value="Home Science">Home Science</option>
                <option value="Finance">Finance</option>
                <option value="Fashion">Fashion</option>
                <option value="Education">Education</option>
                <option value="Computers/ IT">Computers/ IT</option>
                <option value="Commerce">Commerce</option>
                <option value="Arts">Arts</option>
                <option value="Armed Forces">Armed Forces</option>
                <option value="Architecture">Architecture</option>
                <option value="Administration/ Management">Administration/ Management</option>
                <option value="Engineering/Technology">Engineering/Technology</option>
            </select>

                
            </div>
        </div>
        <!--<div class="form-group row">-->
        <!--    <label class="col-md-3 col-form-label">{{translate('Start')}}</label>-->
        <!--    <div class="col-md-9">-->
        <!--        <input type="number" name="education_start" class="form-control" placeholder="{{translate('Start')}}" required>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="form-group row">-->
        <!--    <label class="col-md-3 col-form-label">{{translate('End')}}</label>-->
        <!--    <div class="col-md-9">-->
        <!--        <input type="number" name="education_end"  placeholder="{{ translate('End') }}" class="form-control" >-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
        <button type="submit" class="btn btn-primary">{{translate('Add New Education Info')}}</button>
    </div>
</form>
