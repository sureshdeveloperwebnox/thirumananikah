<!--<div class="card">-->
<!--    <div class="card-header">-->
<!--        <h5 class="mb-0 h6">{{ translate('Religious Attributes') }}</h5>-->
<!--    </div>-->
<!--    <div class="card-body">-->
<!--       <form action="{{ route('physical-attribute.update', $member->id) }}" method="POST">-->
<!--        <div class="form-group row">-->

<!--            <div class="col-md-6">-->
<!--                <label for="religiousness">{{ translate('Religiousness') }}</label>-->
<!--                <select id="religiousness" name="religiousness" class="form-control">-->
<!--                    <option value="Always">Always</option>-->
<!--                    <option value="Sometimes">Sometimes</option>-->
<!--                    <option value="Never">Never</option>-->
<!--                    <option value="Not prefer to say">Not prefer to say</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="col-md-6">-->
<!--                <label for="salah">{{ translate('Performing Salah') }}</label>-->
<!--                <select id="salah" name="salah" class="form-control">-->
<!--                    <option value="Always">Always</option>-->
<!--                    <option value="Sometimes">Sometimes</option>-->
<!--                    <option value="Never">Never</option>-->
<!--                    <option value="Not prefer to say">Not prefer to say</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="form-group row">-->
<!--            <div class="col-md-6">-->
<!--                <label for="fasting">{{ translate('Obligatory Fastings') }}</label>-->
<!--                <select id="fasting" name="fasting" class="form-control">-->
<!--                    <option value="Fasting All">Fasting All</option>-->
<!--                    <option value="Sometimes">Sometimes</option>-->
<!--                    <option value="Never">Never</option>-->
<!--                    <option value="Not prefer to say">Not prefer to say</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="col-md-6">-->
<!--                <label for="zakat">{{ translate('Giving Zakat/Sadaqah') }}</label>-->
<!--                <select id="zakat" name="zakat" class="form-control">-->
<!--                    <option value="Daily">Daily</option>-->
<!--                    <option value="Sometimes">Sometimes</option>-->
<!--                    <option value="Never">Never</option>-->
<!--                    <option value="Not prefer to say">Not prefer to say</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="form-group row">-->
<!--            <div class="col-md-6">-->
<!--                <label for="quran">{{ translate('Reciting Quran') }}</label>-->
<!--                <select id="quran" name="quran" class="form-control">-->
<!--                    <option value="Daily">Daily</option>-->
<!--                    <option value="Sometimes">Sometimes</option>-->
<!--                    <option value="Never">Never</option>-->
<!--                    <option value="Not prefer to say">Not prefer to say</option>-->
<!--                </select>-->
<!--            </div>-->

<!--            <div class="col-md-6">-->
<!--                <label for="religious_interest">{{ translate('Religious Interests') }}</label>-->
<!--                <input type="text" id="religious_interest" name="religious_interest" class="form-control" placeholder="{{ translate('Manual Typing') }}">-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="form-group row">-->
<!--            <div class="col-md-6">-->
<!--                <label for="religious_studies">{{ translate('Religious Studies') }}</label>-->
<!--                <input type="text" id="religious_studies" name="religious_studies" class="form-control" placeholder="{{ translate('Manual Typing') }}">-->
<!--            </div>-->
<!--        </div>-->
<!--            <div class="text-right">-->
<!--              <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>-->
<!--          </div>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="card">-->
<!--    <div class="card-header">-->
<!--        <h5 class="mb-0 h6">{{translate('Hobbies & Interest')}}</h5>-->
<!--    </div>-->
<!--    <div class="card-body">-->
<!--      <form action="{{ route('hobbies.update', $member->id) }}" method="POST">-->
<!--          <input name="_method" type="hidden" value="PATCH">-->
<!--          @csrf-->
<!--          <div class="form-group row">-->
<!--              <div class="col-md-6">-->
<!--                  <label for="hobbies">{{translate('Hobbies')}}</label>-->
<!--                  <input type="text" name="hobbies" value="{{ $member->hobbies->hobbies ?? "" }}" class="form-control" placeholder="{{translate('Hobbies')}}">-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                  <label for="interests">{{translate('Interests')}}</label>-->
<!--                  <input type="text" name="interests" value="{{ $member->hobbies->interests ?? "" }}" placeholder="{{ translate('Interests') }}" class="form-control">-->
<!--              </div>-->
<!--          </div>-->
<!--          <div class="form-group row">-->
<!--              <div class="col-md-6">-->
<!--                  <label for="music">{{translate('Music')}}</label>-->
<!--                  <input type="text" name="music" value="{{ $member->hobbies->music ?? "" }}" class="form-control" placeholder="{{translate('Music')}}">-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                  <label for="books">{{translate('Books')}}</label>-->
<!--                  <input type="text" name="books" value="{{ $member->hobbies->books ?? "" }}" placeholder="{{ translate('Books') }}" class="form-control">-->
<!--              </div>-->
<!--          </div>-->
<!--          <div class="form-group row">-->
<!--              <div class="col-md-6">-->
<!--                  <label for="movies">{{translate('Movies')}}</label>-->
<!--                  <input type="text" name="movies" value="{{ $member->hobbies->movies ?? "" }}" class="form-control" placeholder="{{translate('Movies')}}">-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                  <label for="tv_shows">{{translate('TV Shows')}}</label>-->
<!--                  <input type="text" name="tv_shows" value="{{ $member->hobbies->tv_shows ?? "" }}" placeholder="{{ translate('TV Shows') }}" class="form-control">-->
<!--              </div>-->
<!--          </div>-->
<!--          <div class="form-group row">-->
<!--              <div class="col-md-6">-->
<!--                  <label for="sports">{{translate('Sports')}}</label>-->
<!--                  <input type="text" name="sports" value="{{ $member->hobbies->sports ?? "" }}" class="form-control" placeholder="{{translate('Sports')}}">-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                  <label for="fitness_activities">{{translate('Fitness Activitiess')}}</label>-->
<!--                  <input type="text" name="fitness_activities" value="{{ $member->hobbies->fitness_activities ?? "" }}" placeholder="{{ translate('Fitness Activities') }}" class="form-control">-->
<!--              </div>-->
<!--          </div>-->
<!--          <div class="form-group row">-->
<!--              <div class="col-md-6">-->
<!--                  <label for="cuisines">{{translate('Cuisines')}}</label>-->
<!--                  <input type="text" name="cuisines" value="{{ $member->hobbies->cuisines ?? "" }}" class="form-control" placeholder="{{translate('Cuisines')}}">-->
<!--              </div>-->
<!--              <div class="col-md-6">-->
<!--                  <label for="dress_styles">{{translate('Dress Styles')}}</label>-->
<!--                  <input type="text" name="dress_styles" value="{{ $member->hobbies->dress_styles ?? "" }}" placeholder="{{ translate('Dress Styles') }}" class="form-control">-->
<!--              </div>-->
<!--          </div>-->

<!--          <div class="text-right">-->
<!--              <button type="submit" class="btn btn-primary btn-sm">{{translate('Update')}}</button>-->
<!--          </div>-->
<!--      </form>-->
<!--    </div>-->
<!--</div>-->
