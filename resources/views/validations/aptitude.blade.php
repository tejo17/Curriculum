@if ($errors->has('aptitude'))
<span class="help-block">
	<strong>{{ $errors->first('aptitude') }}</strong>
</span>
@endif