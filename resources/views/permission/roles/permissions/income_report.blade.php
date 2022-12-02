<div class="form-row my-5">
    <div class="col-sm-3">
        <label for="title">Income Report @lang('app.moderation')</label>
    </div>
    <div class="col-sm-9">
        <p>@lang('role.do-you', ['plugin'=> 'Income Report'])</p>
        <div>
            <input type="checkbox" value="income-report-manage" class="flat-red hasChildOptions"
                data-child_id="childOfManageIncomeReport" name="permissions[]" id="ManageIncomeReport"
                @if($permissions['income-report-manage']==1) checked @endif>
            <label class="chk-label-margin mx-1" for="ManageIncomeReport">
                @lang('role.yes-allow', ['attribute'=> 'Income Report'])
            </label>
        </div>
    </div>
</div>
