@if ($errors->has('enterprise'))
<span class="help-block">
	<strong>{{ $errors->first('enterprise') }}</strong>
</span>
@endif

@if ($errors->has('job'))
<span class="help-block">
	<strong>{{ $errors->first('job') }}</strong>
</span>
@endif

@if ($errors->has('city'))
<span class="help-block">
	<strong>{{ $errors->first('city') }}</strong>
</span>
@endif

@if ($errors->has('state'))
<span class="help-block">
	<strong>{{ $errors->first('state') }}</strong>
</span>
@endif

@if ($errors->has('description'))
<span class="help-block">
	<strong>{{ $errors->first('description') }}</strong>
</span>
@endif

@if ($errors->has('from'))
<span class="help-block">
	<strong>{{ $errors->first('from') }}</strong>
</span>
@endif

@if ($errors->has('to'))
<span class="help-block">
	<strong>{{ $errors->first('to') }}</strong>
</span>
@endif