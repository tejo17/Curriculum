@if ($errors->has('grade'))
<span class="help-block">
	<strong>{{ $errors->first('grade') }}</strong>
</span>
@endif

@if ($errors->has('studyCenter'))
<span class="help-block">
	<strong>{{ $errors->first('studyCenter') }}</strong>
</span>
@endif

@if ($errors->has('duration'))
<span class="help-block">
	<strong>{{ $errors->first('duration') }}</strong>
</span>
@endif

@if ($errors->has('descriptionGrade'))
<span class="help-block">
	<strong>{{ $errors->first('descriptionGrade') }}</strong>
</span>
@endif