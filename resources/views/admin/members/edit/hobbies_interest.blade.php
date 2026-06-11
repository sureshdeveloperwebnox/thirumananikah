<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Religiousness')}}</h5>
    </div>
    <div class="card-body">
      <form action="{{ route('hobbies.update', $member->id) }}" method="POST">
          <input name="_method" type="hidden" value="PATCH">
          @csrf
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="hobbies">{{translate('Performing Salah')}}</label>
                  <!--<input type="text" name="hobbies" value="{{ $member->hobbies->hobbies ?? "" }}" class="form-control" placeholder="{{translate('Performing Salah')}}">-->
             
                <select name="hobbies" class="form-control">
    <option value="always" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'always' ? 'selected' : '' }}>
        {{ translate('Always') }}
    </option>
    <option value="sometimes" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'sometimes' ? 'selected' : '' }}>
        {{ translate('Sometimes') }}
    </option>
    <option value="never" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'never' ? 'selected' : '' }}>
        {{ translate('Never') }}
    </option>
    <option value="not_prefer_to_say" {{ isset($member->hobbies) && $member->hobbies->hobbies == 'not_prefer_to_say' ? 'selected' : '' }}>
        {{ translate('Not prefer to say') }}
    </option>
</select>

              </div>
              <div class="col-md-6">
                  <label for="interests">{{translate('Obligatory Fastings')}}</label>
                  <!--<input type="text" name="interests" value="{{ $member->hobbies->interests ?? "" }}" placeholder="{{ translate('Interests') }}" class="form-control">-->
              
              <select name="interests" class="form-control">
    <option value="fasting_all" {{ optional($member->hobbies)->interests == 'fasting_all' ? 'selected' : '' }}>
        {{ translate('Fasting All') }}
    </option>
    <option value="sometimes" {{ optional($member->hobbies)->interests == 'sometimes' ? 'selected' : '' }}>
        {{ translate('Sometimes') }}
    </option>
    <option value="never" {{ optional($member->hobbies)->interests == 'never' ? 'selected' : '' }}>
        {{ translate('Never') }}
    </option>
    <option value="not_prefer_to_say" {{ optional($member->hobbies)->interests == 'not_prefer_to_say' ? 'selected' : '' }}>
        {{ translate('Not prefer to say') }}
    </option>
</select>

              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="music">{{translate('Giving Zakat/Sadaqah ')}}</label>
                  <!--<input type="text" name="music" value="{{ $member->hobbies->music ?? "" }}" class="form-control" placeholder="{{translate('Music')}}">-->
              
              <select name="music" class="form-control">
    <option value="daily" {{ optional($member->hobbies)->music == 'daily' ? 'selected' : '' }}>
        {{ translate('Daily') }}
    </option>
    <option value="sometimes" {{ optional($member->hobbies)->music == 'sometimes' ? 'selected' : '' }}>
        {{ translate('Sometimes') }}
    </option>
    <option value="never" {{ optional($member->hobbies)->music == 'never' ? 'selected' : '' }}>
        {{ translate('Never') }}
    </option>
    <option value="not_prefer_to_say" {{ optional($member->hobbies)->music == 'not_prefer_to_say' ? 'selected' : '' }}>
        {{ translate('Not prefer to say') }}
    </option>
</select>

              </div>
              <div class="col-md-6">
                  <label for="books">{{translate('Reciding Quran ')}}</label>
                  <!--<input type="text" name="books" value="{{ $member->hobbies->books ?? "" }}" placeholder="{{ translate('Books') }}" class="form-control">-->
               <select name="books" class="form-control">
    <option value="daily" {{ optional($member->hobbies)->books == 'daily' ? 'selected' : '' }}>
        {{ translate('Daily') }}
    </option>
    <option value="sometimes" {{ optional($member->hobbies)->books == 'sometimes' ? 'selected' : '' }}>
        {{ translate('Sometimes') }}
    </option>
    <option value="never" {{ optional($member->hobbies)->books == 'never' ? 'selected' : '' }}>
        {{ translate('Never') }}
    </option>
    <option value="not_prefer_to_say" {{ optional($member->hobbies)->books == 'not_prefer_to_say' ? 'selected' : '' }}>
        {{ translate('Not prefer to say') }}
    </option>
</select>

              
              </div>
          </div>
          <div class="form-group row">
              <div class="col-md-6">
                  <label for="movies">{{translate('Religious Interests')}}</label>
                  <input type="text" name="movies" value="{{ $member->hobbies->movies ?? "" }}" class="form-control" placeholder="{{translate('Religious Interests')}}">
              </div>
              <div class="col-md-6">
                  <label for="tv_shows">{{translate('Religious Studies')}}</label>
                  <input type="text" name="tv_shows" value="{{ $member->hobbies->tv_shows ?? "" }}" placeholder="{{ translate('Religious Studies') }}" class="form-control">
              </div>
          </div>
          <!--<div class="form-group row">-->
          <!--    <div class="col-md-6">-->
          <!--        <label for="sports">{{translate('Sports')}}</label>-->
          <!--        <input type="text" name="sports" value="{{ $member->hobbies->sports ?? "" }}" class="form-control" placeholder="{{translate('Sports')}}">-->
          <!--    </div>-->
          <!--    <div class="col-md-6">-->
          <!--        <label for="fitness_activities">{{translate('Fitness Activitiess')}}</label>-->
          <!--        <input type="text" name="fitness_activities" value="{{ $member->hobbies->fitness_activities ?? "" }}" placeholder="{{ translate('Fitness Activities') }}" class="form-control">-->
          <!--    </div>-->
          <!--</div>-->
          <!--<div class="form-group row">-->
          <!--    <div class="col-md-6">-->
          <!--        <label for="cuisines">{{translate('Cuisines')}}</label>-->
          <!--        <input type="text" name="cuisines" value="{{ $member->hobbies->cuisines ?? "" }}" class="form-control" placeholder="{{translate('Cuisines')}}">-->
          <!--    </div>-->
          <!--    <div class="col-md-6">-->
          <!--        <label for="dress_styles">{{translate('Dress Styles')}}</label>-->
          <!--        <input type="text" name="dress_styles" value="{{ $member->hobbies->dress_styles ?? "" }}" placeholder="{{ translate('Dress Styles') }}" class="form-control">-->
          <!--    </div>-->
          <!--</div>-->

          <div class="text-right">
              <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>
          </div>
      </form>
    </div>
</div>
