<div class="d-flex align-items-center">
    <label class="mb-0 mr-2 text-muted small text-nowrap">{{ translate('Show') }}</label>
    <select class="form-control form-control-sm aiz-selectpicker" name="per_page" id="per_page" onchange="this.form.submit()">
        <option value="10" @if(($per_page ?? 10) == 10) selected @endif>10</option>
        <option value="25" @if(($per_page ?? 10) == 25) selected @endif>25</option>
        <option value="50" @if(($per_page ?? 10) == 50) selected @endif>50</option>
        <option value="100" @if(($per_page ?? 10) == 100) selected @endif>100</option>
    </select>
</div>
