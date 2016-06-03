@if ($errors->has('family'))
<span class="help-block">
	<strong>{{ $errors->first('family') }}</strong>
</span>
@endif

@if ($errors->has('cycle'))
<span class="help-block">
	<strong>{{ $errors->first('cycle') }}</strong>
</span>
@endif

@if ($errors->has('cityCycle'))
<span class="help-block">
	<strong>{{ $errors->first('cityCycle') }}</strong>
</span>
@endif

@if ($errors->has('stateCycle'))
<span class="help-block">
	<strong>{{ $errors->first('stateCycle') }}</strong>
</span>
@endif

@if ($errors->has('center'))
<span class="help-block">
	<strong>{{ $errors->first('center') }}</strong>
</span>
@endif

@if ($errors->has('dateTo'))
<span class="help-block">
	<strong>{{ $errors->first('dateTo') }}</strong>
</span>
@endif

@if ($errors->has('dateFor'))
<span class="help-block">
	<strong>{{ $errors->first('dateFor') }}</strong>
</span>
@endif

