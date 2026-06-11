<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Family Information')}}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('families.update', $member->id) }}" method="POST">
            <input name="_method" type="hidden" value="PATCH">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="father">{{translate('Father')}}</label>
                    <input type="text" name="father" value="{{ $member->families->father ?? "" }}" class="form-control" placeholder="{{translate('Father')}}" required>
                    @error('father')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="mother">{{translate('Mother')}}</label>
                    <input type="text" name="mother" value="{{ $member->families->mother ?? "" }}" placeholder="{{ translate('Mother') }}" class="form-control" required>
                    @error('mother')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <!--<div class="col-md-6">-->
                <!--    <label for="sibling">{{translate('Sibling')}}</label>-->
                <!--    <input type="text" name="sibling" value="{{ $member->families->sibling ?? "" }}" class="form-control" placeholder="{{translate('Sibling')}}" required>-->
                <!--    @error('sibling')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
                <div class="col-md-6">
                    <label for="no_of_brothers">{{translate('No. of Brothers')}}</label>
                    <input type="text" name="no_of_brothers" value="{{ $member->families->no_of_brothers ?? "" }}" class="form-control" placeholder="{{translate('No of Brothers')}}" required>
                    @error('sibling')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="no_of_sisters">{{translate('Sibling')}}</label>
                    <input type="text" name="no_of_sisters" value="{{ $member->families->no_of_sisters ?? "" }}" class="form-control" placeholder="{{translate('No of Sisters')}}" required>
                    @error('sibling')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--<div class="col-md-3">-->
                <!--    <label for="no_of_brothers">{{translate('No. of Brothers')}}</label>-->
                <!--    <select name="no_of_brothers" id="no_of_brothers" class="form-control" required>-->
                <!--        <option value="" disabled selected>{{ translate('Select') }}</option>-->
                <!--        @for($i = 0; $i <= 10; $i++)-->
                <!--            <option value="{{ $i }}" {{ (isset($member->families) && $member->families->no_of_brothers == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
                <!--        @endfor-->
                <!--    </select>-->
                <!--    @error('no_of_brothers')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
                <!--<div class="col-md-3">-->
                <!--    <label for="brothers_married">{{translate('Brothers Married')}}</label>-->
                <!--    <select name="brothers_married" id="brothers_married" class="form-control" required>-->
                <!--        <option value="" disabled selected>{{ translate('Select') }}</option>-->
                <!--        @for($i = 0; $i <= 10; $i++)-->
                <!--            <option value="{{ $i }}" {{ (isset($member->families) && $member->families->brothers_married == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
                <!--        @endfor-->
                <!--    </select>-->
                <!--    @error('brothers_married')-->
                <!--        <small class="form-text text-danger">{{ $message }}</small>-->
                <!--    @enderror-->
                <!--</div>-->
            </div>
            <!--<div class="form-group row">-->
            <!--    <div class="col-md-3">-->
            <!--        <label for="no_of_brothers">{{translate('No. of Brothers')}}</label>-->
            <!--        <select name="no_of_brothers" id="no_of_brothers" class="form-control" required>-->
            <!--            <option value="" disabled selected>{{ translate('Select') }}</option>-->
            <!--            @for($i = 1; $i <= 10; $i++)-->
            <!--                <option value="{{ $i }}" {{ (isset($member->families) && $member->families->no_of_brothers == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
            <!--            @endfor-->
            <!--        </select>-->
            <!--        @error('no_of_brothers')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-3">-->
            <!--        <label for="brothers_married">{{translate('Brothers Married')}}</label>-->
            <!--        <select name="brothers_married" id="brothers_married" class="form-control" required>-->
            <!--            <option value="" disabled selected>{{ translate('Select') }}</option>-->
            <!--            @for($i = 0; $i <= 10; $i++)-->
            <!--                <option value="{{ $i }}" {{ (isset($member->families) && $member->families->brothers_married == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
            <!--            @endfor-->
            <!--        </select>-->
            <!--        @error('brothers_married')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-3">-->
            <!--        <label for="no_of_sisters">{{translate('No. of Sisters')}}</label>-->
            <!--        <select name="no_of_sisters" id="no_of_sisters" class="form-control" required>-->
            <!--            <option value="" disabled selected>{{ translate('Select') }}</option>-->
            <!--            @for($i = 0; $i <= 10; $i++)-->
            <!--                <option value="{{ $i }}" {{ (isset($member->families) && $member->families->no_of_sisters == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
            <!--            @endfor-->
            <!--        </select>-->
            <!--        @error('no_of_sisters')-->
            <!--            <small class="form-text text-danger">{{ $message }}</small>-->
            <!--        @enderror-->
            <!--    </div>-->
            <!--    <div class="col-md-3">-->
            <!--        <label for="sisters_married">{{translate('Sisters Married')}}</label>-->
            <!--        <select name="sisters_married" id="sisters_married" class="form-control" required>-->
            <!--            <option value="" disabled selected>{{ translate('Select') }}</option>-->
            <!--            @for($i = 0; $i <= 10; $i++)-->
            <!--                <option value="{{ $i }}" {{ (isset($member->families) && $member->families->sisters_married == $i) ? 'selected' : '' }}>{{ $i }}</option>-->
            <!--            @endfor-->
            <!--        </select>-->
            <!--        @error('sisters_married')-->
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
