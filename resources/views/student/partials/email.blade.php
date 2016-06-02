<div class=" col-md-6 control-group{{ $errors->has('email') ? ' has-error' : '' }}">
    	<div class="row">
    		<div class="input-field col-md-12">
    			<i class="material-icons prefix">account_circle</i>
    			{{ Form::text('email', null,['id' => "email"]) }}
    			{{ Form::label('email', 'Email') }}
    		</div>
    	</div>
    	@if ($errors->has('email'))
    	<span class="help-block">
    		<strong>{{ $errors->first('email') }}</strong>
    	</span>
    	@endif
    </div>