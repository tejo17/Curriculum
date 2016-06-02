<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Currículum Vitae</title>
      {!! Html::style('/css/estilo-pdf-curriculum.css') !!}

 
     {{ $datos['imagen'] }}
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
          <td rowspan="5" class="tds-left"><img style="margin-left:155px" src="/img/imgUser/a8ab40cc083f0d68dbc9c982296548c7/d432f22ad476231664f52160801eae1a.png" alt="" width="70" height="70"></td>
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
          <td style="width:475px;"><span style="padding-left:15px; margin-right;10px" >Redes sociales, Nombre red social :  nombre cuenta.</span></td>
        </tr>
        <tr>
          <td rowspan="5" style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">{{ $datos['birthdate'] }} , Nacionalidad: {{ $datos['nationality'] }}</span></td>   
        </tr>
      </table>

      <!-- Tabla experiencia profesional -->
      <table>
        <tr>
          <td style="width:265px; text-align:right "><span style="color:darkbluE;">EXPERIENCIA PROFESIONAL</span></td>
          <td style="width:475px;"></td>            
        </tr>
        <tr>
          <td class="tds-left align-right"><span style="margin-left:125px">(01-10-2006 –01- 04-2010)</span></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Nombre del empleo</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">Empresa en la que trabajó/a. Ciudad y Provincia</span></td>         
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">Descripción</span></td>
        </tr>  
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>  
      </table>

      <!-- Tabla educación y formación -->
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">EDUCACIÓN Y FORMACIÓN</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class="tds-left align-right"><span>(2006–2010) ó (2015-cursando)</span></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Nombre del título</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">Centro en el que se obtuvo el título. Localidad y Provincia</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">Descripción</span></td>
        </tr>
         <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>  
      </table>

      <!-- Tabla Certificaciones -->
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">CERTIFICACIONES</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Certificación</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px;">Institución</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">Descripción</span></td>
        </tr>
         <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>  
      </table>

      <!-- Otros Cursos -->
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">OTROS CURSOS</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Curso</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"><span style="padding-left:15px; text-transform:">Institución</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px; margin-left:15px"><span style="padding-left:15px;">Duración: ...</span></td>
        </tr>  
        <tr>
          <td style="width:265px;"></td>
          <td class"align-justify" style="width:457px; margin-left:15px; padding-left:15px;"><span style="align:justify;">Descripción Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur nemo, vel vero minima maiores assumenda aspernatur neque, eum quam adipisci doloribus labore inventore dolorem magnam, error ab quas ea suscipit.</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
      </table>

      <!-- Tabla de idiomas -->
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
        <td class="td-idiomas align-center" style="padding-bottom:14px;"><span style="font-weight:bold">Expresión Oral</span></td>
        <td class="td-idiomas align-center" style="padding-bottom:14px;"><span style="font-weight:bold; padding-top:5px">Expresión Escrita</span></td>
      </tr>
      <tr>
        <td class"align-right" style="width:265px;">Idioma</td>
        <td class="align-center td-nivel"><span>Bajo</span></td>
        <td class="align-center td-nivel"><span>Bajo</span></td>
        <td class="align-center td-nivel"><span>Bajo</span></td>
        <td class="align-center td-nivel"><span>Bajo</span></td> 
      </tr>
       <tr>
        <td style="width:265px;"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td>
        <td class="td-nivel"></td> 
      </tr>
    </table>

    <!-- Tabla licencias de conducir -->
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">LICENCIAS DE CONDUCIR</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class="tds-left align-right"></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Licencias</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
      </table>

      <!-- Tabla licencias de conducir -->
      <table>
        <tr>
          <td style="width:265px; text-align:right"><span style="color:darkblue;">APTITUDES</span></td>
          <td style="width:475px;"></td>
        </tr>
        <tr>
          <td class"align-right" class="tds-left "></td>
          <td class="tds-right border-top-darkblue"><span style="padding-left:15px;">Aptitud</span></td>
        </tr>
        <tr>
          <td style="width:265px;"></td>
          <td style="width:475px;"></td>
        </tr>
      </table>
  </div>
</div>
</body>
</html>