@if ($errors->has('language'))
<span class="help-block">
	<strong>{{ $errors->first('language') }}</strong>
</span>
@endif

@if ($errors->has('readingComprehension'))
<span class="help-block">
	<strong>{{ $errors->first('readingComprehension') }}</strong>
</span>
@endif

@if ($errors->has('WrittedExpression'))
<span class="help-block">
	<strong>{{ $errors->first('WrittedExpression') }}</strong>
</span>
@endif

@if ($errors->has('listeningComprehension'))
<span class="help-block">
	<strong>{{ $errors->first('listeningComprehension') }}</strong>
</span>
@endif

@if ($errors->has('oralExpression'))
<span class="help-block">
	<strong>{{ $errors->first('oralExpression') }}</strong>
</span>
@endif