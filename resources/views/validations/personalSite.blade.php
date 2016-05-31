@if ($errors->has('site'))
<span class="help-block">
	<strong>{{ $errors->first('site') }}</strong>
</span>
@endif

@if ($errors->has('personalsite'))
<span class="help-block">
	<strong>{{ $errors->first('personalsite') }}</strong>
</span>
@endif