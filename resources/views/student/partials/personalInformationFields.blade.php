<div class="">
    <div class=" col-md-6 control-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('firstName', null,['id' => "firstName"]) }}
                {{ Form::label('firstName', 'Nombre') }}

            </div>
        </div>
            @if ($errors->has('firstName'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </span>
            @endif
    </div>
    <div class=" col-md-6 control-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('lastName', null,['id' => "lastName"]) }}
                {{ Form::label('lastName', 'Apellidos') }}
            </div>
        </div>
            @if ($errors->has('lastName'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif
    </div>
     <div class=" col-md-6 control-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">account_circle</i>
                {{ Form::text('nationality', null,['id' => "nationality"]) }}
                {{ Form::label('nationality', 'Nacionalidad') }}
            </div>
        </div>
            @if ($errors->has('nationality'))
                <span class="help-block">
                    <strong>{{ $errors->first('nationality') }}</strong>
                </span>
            @endif
    </div>
    <div class="col-md-6 control-group{{ $errors->has('dni') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">assignment_ind</i>
                {{ Form::text('dni', null,['id' => "dni"]) }}
                {{ Form::label('dni', 'DNI') }}
            </div>
        </div>
            @if ($errors->has('dni'))
                <span class="help-block">
                    <strong>{{ $errors->first('dni') }}</strong>
                </span>
            @endif
    </div>
    <div class="col-md-6 control-group{{ $errors->has('nre') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">fingerprint</i>
            {{ Form::label('nre', 'NRE') }}
            {{ Form::text('nre', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('nre'))
            <span class="help-block">
                <strong>{{ $errors->first('nre') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-6 control-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">phone</i>
                {{ Form::text('phone', null,['id' => "phone"]) }}
                {{ Form::label('phone', 'Telefono') }}
            </div>
        </div>
            @if ($errors->has('phone'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
    </div>

    <div class="col-md-6 control-group{{ $errors->has('birthdate') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">today</i>
                {{ Form::label('birthdate', 'Fecha de nacimiento', ['class' => 'labelpicker']) }}
                {{ Form::text('birthdate',null, ['class' => 'datepicker', 'id' => 'picker']) }}
            </div>
        </div>
        @if ($errors->has('birthdate'))
            <span class="help-block">
                <strong>{{ $errors->first('birthdate') }}</strong>
            </span>
        @endif
    </div>

     <fieldset style="clear:both">    
    <legend style="width:auto;">Direccion</legend>
    <div class="control-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">person_pin_circle</i>
                {{ Form::label('address', 'Dirección') }}
                {{ Form::text('address', null, ['class' => 'form-control-static']) }}
            </div>
        </div>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-4 control-group{{ $errors->has('postalCode') ? ' has-error' : '' }}"style="margin-left:-15px;">
        <div class="row">
            <div class="input-field col-md-12">
                <i class="material-icons prefix">person_pin_circle</i>
                {{ Form::label('postalCode', 'Codigo Postal') }}
                {{ Form::text('postalCode', null, ['class' => 'form-control']) }}
            </div>
        </div>
        @if ($errors->has('postalCode'))
            <span class="help-block">
                <strong>{{ $errors->first('postalCode') }}</strong>
            </span>
        @endif
    </div>    
    <div class="col-md-4 {{ $errors->has('state') ? ' has-error' : '' }}">
        <div class="row">
            
            <div class="input-field col-md-12">
         <input id="state" type="text" class="validate" name="state" readonly>
          {{ Form::label('state', 'Provincia') }}
        </div>
        </div>

        @if ($errors->has('state'))
            <span class="help-block">
                <strong>{{ $errors->first('state') }}</strong>
            </span>
        @endif
    </div>
        <div class="col-md-4 form-group{{ $errors->has('city') ? ' has-error' : '' }}">
        <div class="row">
            <div class="col-md-12">
                
                {{ Form::label('city', 'Población') }}
                {{ Form::select('city', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'city']) }}
               
            </div>
        </div>
        @if ($errors->has('city'))
            <span class="help-block">
                <strong>{{ $errors->first('city') }}</strong>
            </span>
        @endif
    </div>

            
   </fieldset>


    <br>
    @include('partials.upload.dragDrop')
    @include('student.partials.email')
</div>
