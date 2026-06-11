<form action="{{ route('career.store') }}" method="POST">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title h6">{{translate('Add New Profession Info')}}</h5>
        <button type="button" class="close" data-dismiss="modal">
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="user_id" value="{{ $member_id }}">
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Designation')}}</label>
            <div class="col-md-9">
                <!--<input type="text" name="designation" class="form-control" placeholder="{{translate('designation')}}" required>-->
                
                    <select id="designation" name="designation" class="form-control" required>
                        <option value="Not working">Not working</option>
                        <option value="Student">Student</option>
                        <option value="Non-mainstream professional">Non-mainstream professional</option>
                        <option value="Accountant">Accountant</option>
                        <option value="Acting Professional">Acting Professional</option>
                        <option value="Actor">Actor</option>
                        <option value="Administration Professional">Administration Professional</option>
                        <option value="Advertising Professional">Advertising Professional</option>
                        <option value="Air Hostess">Air Hostess</option>
                        <option value="Airline Professional">Airline Professional</option>
                        <option value="Architect">Architect</option>
                        <option value="Artist">Artist</option>
                        <option value="Audiologist">Audiologist</option>
                        <option value="Bank Officer">Bank Officer</option>
                        <option value="Beautician">Beautician</option>
                        <option value="Biologist / Botanist">Biologist / Botanist</option>
                        <option value="Business Person">Business Person</option>
                        <option value="Chartered Accountant">Chartered Accountant</option>
                        <option value="Civil Engineer">Civil Engineer</option>
                        <option value="Clerical Official">Clerical Official</option>
                        <option value="Commercial Pilot">Commercial Pilot</option>
                        <option value="Company Secretary">Company Secretary</option>
                        <option value="Computer Engineer">Computer Engineer</option>
                        <option value="Consultant">Consultant</option>
                        <option value="Contractor">Contractor</option>
                        <option value="Cost Accountant">Cost Accountant</option>
                        <option value="Creative Person">Creative Person</option>
                        <option value="Customer Support Professional">Customer Support Professional</option>
                        <option value="Defence Employee">Defence Employee</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Designer">Designer</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Economist">Economist</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Engineer (Mechanical)">Engineer (Mechanical)</option>
                        <option value="Engineer (Project)">Engineer (Project)</option>
                        <option value="Entertainment Professional">Entertainment Professional</option>
                        <option value="Event Manager">Event Manager</option>
                        <option value="Executive">Executive</option>
                        <option value="Factory worker">Factory worker</option>
                        <option value="Farmer">Farmer</option>
                        <option value="Fashion Designer">Fashion Designer</option>
                        <option value="Finance Professional">Finance Professional</option>
                        <option value="Flight Attendant">Flight Attendant</option>
                        <option value="Government Employee">Government Employee</option>
                        <option value="Health Care Professional">Health Care Professional</option>
                        <option value="Home Maker">Home Maker</option>
                        <option value="Hotel & Restaurant Professional">Hotel & Restaurant Professional</option>
                        <option value="Human Resources Professional">Human Resources Professional</option>
                        <option value="Interior Designer">Interior Designer</option>
                        <option value="Investment Professional">Investment Professional</option>
                        <option value="IT/Telecom Professional">IT/Telecom Professional</option>
                        <option value="Journalist">Journalist</option>
                        <option value="Lawyer">Lawyer</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Legal Professional">Legal Professional</option>
                        <option value="Manager">Manager</option>
                        <option value="Marketing Professional">Marketing Professional</option>
                        <option value="Media Professional">Media Professional</option>
                        <option value="Medical Professional">Medical Professional</option>
                        <option value="Medical Transcriptionist">Medical Transcriptionist</option>
                        <option value="Merchant Naval Officer">Merchant Naval Officer</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Occupational Therapist">Occupational Therapist</option>
                        <option value="Optician">Optician</option>
                        <option value="Pharmacist">Pharmacist</option>
                        <option value="Physician Assistant">Physician Assistant</option>
                        <option value="Physicist">Physicist</option>
                        <option value="Physiotherapist">Physiotherapist</option>
                        <option value="Pilot">Pilot</option>
                        <option value="Politician">Politician</option>
                        <option value="Production professional">Production professional</option>
                        <option value="Professor">Professor</option>
                        <option value="Psychologist">Psychologist</option>
                        <option value="Public Relations Professional">Public Relations Professional</option>
                        <option value="Real Estate Professional">Real Estate Professional</option>
                        <option value="Research Scholar">Research Scholar</option>
                        <option value="Retired Person">Retired Person</option>
                        <option value="Retail Professional">Retail Professional</option>
                        <option value="Sales Professional">Sales Professional</option>
                        <option value="Scientist">Scientist</option>
                        <option value="Self-employed Person">Self-employed Person</option>
                        <option value="Social Worker">Social Worker</option>
                        <option value="Software Consultant">Software Consultant</option>
                        <option value="Sportsman">Sportsman</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Technician">Technician</option>
                        <option value="Training Professional">Training Professional</option>
                        <option value="Transportation Professional">Transportation Professional</option>
                        <option value="Veterinary Doctor">Veterinary Doctor</option>
                        <option value="Volunteer">Volunteer</option>
                        <option value="Writer">Writer</option>
                        <option value="Zoologist">Zoologist</option>
                        <option value="Other">Other</option>
                        <option value="Bank Staff">Bank Staff</option>
                        <option value="Captain">Captain</option>
                        <option value="Computer Programmer">Computer Programmer</option>
                        <option value="Counsellor">Counsellor</option>
                        <option value="Draftsman">Draftsman</option>
                        <option value="Driver">Driver</option>
                        <option value="Electrician">Electrician</option>
                        <option value="Entrepreneur">Entrepreneur</option>
                        <option value="Graphic Designer">Graphic Designer</option>
                        <option value="Gulf Based">Gulf Based</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Hotel Professional">Hotel Professional</option>
                        <option value="Insurance Agent">Insurance Agent</option>
                        <option value="Lab Technician">Lab Technician</option>
                        <option value="Management Professional">Management Professional</option>
                        <option value="Medical Representative">Medical Representative</option>
                        <option value="Microbiologist">Microbiologist</option>
                        <option value="NRI">NRI</option>
                        <option value="Office Staff">Office Staff</option>
                        <option value="Paramedical Staff">Paramedical Staff</option>
                        <option value="Police">Police</option>
                        <option value="Priest">Priest</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Technical Staff">Technical Staff</option>
                        <option value="Trader">Trader</option>
                        <option value="Trainer">Trainer</option>
                        <option value="Tutor">Tutor</option>
                        <option value="Videographer">Videographer</option>
                        <option value="Photographer">Photographer</option>
                        <option value="Web Designer">Web Designer</option>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Wholesale Businessman">Wholesale Businessman</option>
                        <option value="Nanny / Child Care">Nanny / Child Care</option>
                        <option value="Islamic Teacher">Islamic Teacher</option>
                        <option value="Islamic Scholar">Islamic Scholar</option>
                        <option value="Work at Mosque">Work at Mosque</option>
                        <option value="No Occupation">No Occupation</option>
                        <option value="Military">Military</option>
                        <option value="Domestic Helper">Domestic Helper</option>
                        <option value="Laborer">Laborer</option>
                        <option value="Retired">Retired</option>
                        <option value="Hair Dresser">Hair Dresser</option>
                        <option value="Librarian">Librarian</option>
                        <option value="CEO/CTO/President">CEO/CTO/President</option>
                        <option value="Director/Chairman">Director/Chairman</option>
                        <option value="Navy">Navy</option>
                        <option value="Airforce">Airforce</option>
                        <option value="Air Hostess">Air Hostess</option>
                        <option value="Agriculture">Agriculture</option>
                        <option value="Auditor">Auditor</option>
                        <option value="Hardware Professional">Hardware Professional</option>
                        <option value="Event Management Professional">Event Management Professional</option>
                        <option value="Education Professional">Education Professional</option>
                        <option value="Banking Professional">Banking Professional</option>
                        <option value="Engineer (Electrical)">Engineer (Electrical)</option>
                        <option value="Engineer (Civil)">Engineer (Civil)</option>
                        <option value="Managing Director">Managing Director</option>
                        <option value="Civil Service">Civil Service</option>
                        <option value="Religious Activities">Religious Activities</option>
                        <option value="Islamic Dawa">Islamic Dawa</option>
                        <option value="Islamic Activities">Islamic Activities</option>
                        <option value="Chemist">Chemist</option>
                        <option value="Tax Consultant">Tax Consultant</option>
                        <option value="Clinical Pharmacist">Clinical Pharmacist</option>
                        <option value="Assistant Professor">Assistant Professor</option>
                        <option value="Insurance Advisor">Insurance Advisor</option>
                        <option value="Chef">Chef</option>
                        <option value="Special Educator (Disability)">Special Educator (Disability)</option>
                        <option value="Logistics">Logistics</option>
                        <option value="Adviser">Adviser</option>
                        <option value="Food Technology">Food Technology</option>
                        <option value="Video Editor">Video Editor</option>
                        <option value="Data Analyst and Content Strategist">Data Analyst and Content Strategist</option>
                        <option value="Speech Therapist">Speech Therapist</option>
                        <option value="Optometrist">Optometrist</option>
                        <option value="Unemployed">Unemployed</option>
                        <option value="Other">Other</option>
                        <option value="Professional Type">PROFESSIONAL TYPE</option>
                        <option value="Not Employed">Not Employed</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Government">Government</option>
                        <option value="Private">Private</option>
                        <option value="Homemaker">Homemaker</option>
                        <option value="Business">Business</option>
                        <option value="Defence">Defence</option>
                        <option value="Self Employed">Self Employed</option>
                        <option value="Retired">Retired</option>
                        <option value="Other">Other</option>
                    </select>

                
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label">{{translate('Professional Type')}}</label>
            <div class="col-md-9">
                <!--<input type="text" name="company"  placeholder="{{ translate('company') }}" class="form-control" required>-->
            
           <select name="company" class="form-control" required>
            <option value="Not Employed">Not Employed</option>
            <option value="Student">Student</option>
            <option value="Part Time">Part Time</option>
            <option value="Full Time">Full Time</option>
            <option value="Government">Government</option>
            <option value="Private">Private</option>
            <option value="Homemaker">Homemaker</option>
            <option value="Business">Business</option>
            <option value="Defence">Defence</option>
            <option value="Self Employed">Self Employed</option>
            <option value="Retired">Retired</option>
            <option value="Other">Other</option>
            <option value="Prefer not to say">Prefer not to say</option>
        </select>
            
            </div>
        </div>
        <!--<div class="form-group row">-->
        <!--    <label class="col-md-3 col-form-label">{{translate('Start')}}</label>-->
        <!--    <div class="col-md-9">-->
        <!--        <input type="number" name="career_start" class="form-control" placeholder="{{translate('Start')}}" required>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="form-group row">-->
        <!--    <label class="col-md-3 col-form-label">{{translate('End')}}</label>-->
        <!--    <div class="col-md-9">-->
        <!--        <input type="number" name="career_end"  placeholder="{{ translate('End') }}" class="form-control">-->
        <!--    </div>-->
        <!--</div>-->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Close')}}</button>
        <button type="submit" class="btn btn-primary">{{translate('Add New Career Info')}}</button>
    </div>
</form>
