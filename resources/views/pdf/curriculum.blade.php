<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Currículum Vitae</title>
      {!! Html::style('/css/estilo-pdf-curriculum.css') !!}

</head>
<body>
  <div id="details" class="clearfix">
    <div id="invoice" style="margin-left:-45px">
      <h1 class="align-center">Currículum Vitae</h1>

      <!-- Tabla información personal -->
      <table>
        <tr>
          <td style="text-align:right"><span style="color:darkblue;">INFORMACIÓN PERSONAL</span></td>
          <td style="width:475px;"></td> 
        </tr>
        <tr>
          <td rowspan="5" class="tds-left"><img style="margin-left:155px" src="{{ $datos['imagen'] }}" alt="" width="70" height="70"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px; text-transform:capitalize">{{ $datos['lastName'] }}, {{ $datos['firstName'] }}</span></td>
        </tr>
        <tr>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $datos['address'] }}, {{ $datos['postalCode'] }} , {{ $datos['city'] }}, {{ $datos['state'] }}</span></td>
        </tr>
        <tr>
          <td style="width:475px;"><span style="padding-left:15px">{{ $datos['phone'] }}</span></td>
        </tr>
        <tr>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $datos['email'] }}</span></td>
        </tr>
        <tr>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $datos['birthdate'] }} , Nacionalidad: {{ $datos['nationality'] }}</span></td>   
        </tr>
        <?php if ($sitios[0] != "vacio"): ?>
          <?php foreach ($sitios as $sitio): ?>
        <tr>
          <td colspan="" style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px; margin-right:10px" > {{ $sitio[0] }} :  {{ $sitio[1] }}</span></td>
        </tr>
          <?php endforeach ?>
      <?php endif ?>
      </table>

      <!-- Tabla experiencia profesional -->
      <?php if ($experiences[0] != "vacio"): ?>
      <table>
        <tr>
          <td style="width:265px; text-align:right "><span style="color:darkbluE;">EXPERIENCIA PROFESIONAL</span></td>
          <td style="width:475px;"></td>            
        </tr>
        <?php foreach ($experiences as $experience): ?>
          
        <tr>
          <td class="tds-left align-right"><span style="margin-left:125px">{{ $experience [5]}} – {{ $experience[6]}}</span></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{ $experience [0]}}</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $experience [1]}}</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $experience [4]}}</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $experience [3]}}</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $experience [2]}}</span></td>
        </tr>  
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
        <?php endforeach ?>
      </table>
      <?php endif ?>

      <!-- Tabla educación y formación -->
      <?php if ($ciclos[0] != "vacio"): ?>
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">EDUCACIÓN Y FORMACIÓN</span></td>
          <td style="width:475px;"></td>
        </tr>
        <?php foreach ($ciclos as $ciclo): ?>
          
        <tr>
          <td class="tds-left align-right"><span>{{ $ciclo[6] }} - {{ $ciclo[7] }}</span></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{ $ciclo[1] }}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $ciclo[3] }}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">{{ $ciclo[4] }}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">{{ $ciclo[5] }}</span></td>
        </tr>
         <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>  
      <?php endforeach ?>
      </table>
      <?php endif ?>
      
      <!-- Tabla Certificaciones -->
        <?php if ($certificaciones[0] != "vacio"): ?>
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">CERTIFICACIONES</span></td>
          <td style="width:475px;"></td>
        </tr>
       <?php foreach ($certificaciones as $key => $certificacion): ?>
          <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{$certificacion[0]}}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{$certificacion[1]}}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">{{$certificacion[2]}}</span></td>
        </tr>
         <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>  
       <?php endforeach ?>
      </table>
        <?php endif ?>

      <!-- Otros Cursos -->
        <?php if ($otros[0] != "vacio"): ?>
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">OTROS CURSOS</span></td>
          <td style="width:475px;"></td>
        </tr>
       <?php foreach ($otros as $key => $otro): ?>
          <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{ $otro[0]}}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px; text-transform:">{{ $otro[1]}}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">{{ $otro[3]}}</span></td>
        </tr>  
        <tr>
          <td style="width:265px;"></td>
          <td class"align-justify" style="width:457px; margin-left:15px; padding-left:15px;"><span style="align:justify;">{{ $otro[2]}}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
       <?php endforeach ?>
      </table>
     <?php endif ?>

      <!-- Tabla de idiomas -->
      <?php if ($lenguajes[0] != "vacio"): ?>
      <table>
       <tr>
        <td style="width:265px; text-align:right"><span style="color:darkblue;">IDIOMAS</span></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
      </tr>
      <tr>
        <td class="tds-left"><span style="margin-left:105px"></span></td>
        <td class="td-idiomas align-center"><span style="font-weight:bold">Comprensión De Lectura</span></td>
        <td class="td-idiomas align-center"><span style="font-weight:bold">Comprensión Auditiva</span></td>
        <td class="td-idiomas align-center" style="padding-bottom:14px;"><span style="font-weight:bold">Expresión Escrita</span></td>
        <td class="td-idiomas align-center" style="padding-bottom:14px;"><span style="font-weight:bold; padding-top:5px">Expresión Oral</span></td>
      </tr>
      <?php foreach ($lenguajes as $lenguaje): ?>  
      <tr>
        <td class="align-right" style="width:265px;font-weight:bold;">{{ $lenguaje[0] }}</td>
        <td class="align-center td-nivel"><span>{{ $lenguaje[1] }}</span></td>
        <td class="align-center td-nivel"><span>{{ $lenguaje[2] }}</span></td>
        <td class="align-center td-nivel"><span>{{ $lenguaje[3] }}</span></td>
        <td class="align-center td-nivel"><span>{{ $lenguaje[4] }}</span></td> 
      </tr>
      <?php endforeach ?>
       <tr>
        <td style="width:265px;"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td> 
      </tr>
    </table>
      <?php endif ?>

    <!-- Tabla licencias de conducir -->
    <?php if ($licencias != "vacio"): ?>
     <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">LICENCIAS DE CONDUCIR</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{ $licencias }}</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
      </table>
    <?php endif ?>

      <!-- Tabla licencias de conducir -->
      <?php if ($aptitudes[0] != "vacio"): ?>
              <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">APTITUDES</span></td>
          <td style="width:475px;"></td>
        </tr>
        <?php foreach ($aptitudes as $aptitud): ?>     
          <tr>
          <td class"align-right" class="tds-left "></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">{{ $aptitud }}</span></td>
        </tr>
        <?php endforeach ?>

        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
      </table>
      <?php endif ?>
  </div>
</div>
</body>
</html>