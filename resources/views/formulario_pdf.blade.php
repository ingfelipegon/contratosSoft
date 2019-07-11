<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

    <title>Formulario Online de Solicitud de Acreditación como víctima del caso 01</title>


</head>
<body>

<div class="container">
  <img src="{{asset('images/membrete.png')}}" >
  <div class="panel panel-default">
    </div>
    <h1>Formulario Online de Solicitud de Acreditación como víctima del caso 01</h1>

    <h4 class="headline mb-0">Información personal</h4>
    @isset($datos['solicitud_anterior'])
    <div><label><b>¿Ha presentado con anterioridad una Solicitud de Acreditación ante la Jurisdicción Especial para la Paz? <b></label></div>
      <div>{{$datos['solicitud_anterior']}}</div>
    @endisset
    @isset($datos['no_registro_victima'])
   <div><label><b>Si tiene un número de registro ante el Registro Único de Víctimas, porfavor indíquelo <b></label></div>
   <div>{{$datos['no_registro_victima']}}</div>
   @endisset
   @isset($datos['formulario_propio'])
   <div><label><b>¿Llena usted por sí mismo este formulario? <b></label></div>
   <div>{{$datos['formulario_propio']}}</div>
   @endisset
   @isset($datos['persona_victima'])
   <div<label><b>Por favor indique el nombre de la persona que le está ayudando con este Formulario: <b></label></div>
   <div>{{$datos['persona_victima']}}</div>
   @endisset
   @isset($datos['nombre_victima_solicitante'])
   <div><label><b>Nombre de la víctima solicitante: <b></label></div>
   <div>{{$datos['nombre_victima_solicitante']}} {{$datos['nombre2_victima_solicitante']}} {{$datos['apellido1_victima_solicitante']}} {{$datos['apellido2_victima_solicitante']}}</div>
   @endisset
   @isset($datos['direccion'])
   <div><label><b>Direccion residencia actual<b></label></div>
   <div>{{$datos['direccion']}}</div>
   @endisset
   @isset($datos['departamento_id'])
   <div><label><b>Departamento residencia actual<b></label></div>
   <div>{{$datos['departamento_id']}}</div>
   @endisset
   @isset($datos['municipio_id'])
   <div><label><b>Municipio residencia actual<b></label></div>
   <div>{{$datos['municipio_id']}}</div>
   @endisset
   @isset($datos['grupo_etnico'])
   <div><label><b>Pertenencia a un grupo étnico: <b></label></div>
   <div>{{$datos['grupo_etnico']}}</div>
   @endisset
   @isset($datos['nombre_grupo_etnico'])
   <div><label><b>Por favor indique el nombre del grupo étnico al que pertenece: <b></label></div>
   <div>{{$datos['nombre_grupo_etnico']}}</div>
   @endisset
   @isset($datos['organizacion_victimas'])
   <div><label><b>Pertenencia a organizacion de victimas: <b></label></div>
   <div>{{$datos['organizacion_victimas']}}</div>
   @endisset
   @isset($datos['nombre_organizacion_victimas'])
   <div><label><b>Por favor indique el nombre de la Organización de víctimas a la que pertenece: <b></label></div>
   <div>{{$datos['nombre_organizacion_victimas']}}</div>
   @endisset
   @isset($datos['sujeto_colectivo'])
   <div><label><b>Pertenencia a un sujeto colectivo que desea acreditarse como víctima: <b></label></div>
   <div>{{$datos['sujeto_colectivo']}}</div>
   @endisset
   @isset($datos['nombre_sujeto_colectivo'])
   <div><label><b>Por favor indique el nombre del sujeto colectivo al que pertenece: <b></label></div>
   <div>{{$datos['nombre_sujeto_colectivo']}}</div>
   @endisset
   @isset($datos['telefono_fijo'])
   <div><label><b>Datos de contacto Número de teléfono fijo de residencia<b></label></div>
   <div>{{$datos['indicativo']}} + {{$datos['telefono_fijo']}}</div>
   @endisset
   @isset($datos['telefono_celular'])
   <div><label><b>Datos de contacto Número de teléfono celular<b></label></div>
   <div>{{$datos['telefono_celular']}}</div>
   @endisset
   @isset($datos['correo'])
   <div><label><b>Datos de contacto correo electrónico<b></label></div>
   <div>{{$datos['correo']}}</div>
   @endisset
   @isset($datos['ocupacion_actual'])
   <div><label><b>Ocupación actual <b></label></div>
   <div>{{$datos['ocupacion_actual']}}</div>

   @endisset
   @isset($datos['hecho_victimizante'])
    <h4 class="headline mb-0">Hechos victimizantes</h4>
   <div><label><b>Esta solicitud de acreditación la hago en razón de los siguientes hechos victimizantes: <b></label></div>
   <div>{{$datos['hecho_victimizante']}}</div>
   @endisset
   @isset($datos['fecha_hechos_inicio'])
   <div><label><b>Fecha inicio de los hechos: <b></label></div>
   <div>{{$datos['fecha_hechos_inicio']}}</div>
   @endisset
   @isset($datos['fecha_hechos_fin'])
   <div><label><b>Fecha fin de los hechos: <b></label></div>
   <div>{{$datos['fecha_hechos_fin']}}</div>
   @endisset
   @isset($datos['departamento_hechos_id'])
   <div><label><b>Departamento de los hechos <b></label></div>
   <div>{{$datos['departamento_hechos_id']}}</div>
   @endisset
   @isset($datos['municipio_hechos_id'])
   <div><label><b>Municipio de los hechos <b></label></div>
   <div>{{$datos['municipio_hechos_id']}}</div>
   @endisset
   @isset($datos['lugar_hechos'])
   <div><label><b>Lugar de los hechos <b></label></div>
   <div>{{$datos['lugar_hechos']}}</div>
   @endisset

   @isset($responsables)
    <h4 class="headline mb-0">Presuntos responsables</h4>

    @foreach ($responsables as $item)
      <div>
        <div><label><b>Nombre: {{$item}}<b></label></div>

      </div>
 @endforeach
 @endisset
 @isset($familiares)
<h4 class="headline mb-0">Familiares / Allegados</h4>
    @foreach ($familiares as $item)
      <div>
        <div><label><b>Nombre: {{$item}}<b></label></div>

      </div>
 @endforeach
 @endisset
    <h4 class="headline mb-0">Sobre la representación legal</h4>

    @isset($datos['abogado_confianza'])
   <div><label><b>¿Cuenta usted con un abogado de confianza que lo represente en el proceso? <b></label></div>
   <div>{{$datos['abogado_confianza']}}</div>
   @endisset
   @isset($datos['nombre_abogado'])
   <div><label><b>Nombre del abogado:<b></label></div>
   <div>{{$datos['nombre_abogado']}} {{$datos['nombre2_abogado']}} {{$datos['apellido1_abogado']}} {{$datos['apellido2_abogado']}}</div>
   @endisset
   @isset($datos['direccion_abogado'])
   <div><label><b>Dirección de notificación<b></label></div>
   <div>{{$datos['direccion_abogado']}}</div>
   @endisset
   @isset($datos['telefono_abogado'])
   <div><label><b>Teléfono de contacto<b></label></div>
   <div>{{$datos['telefono_abogado']}}</div>
   @endisset
   @isset($datos['celular_abogado'])
   <div><label><b>Celular de contacto<b></label></div>
   <div>{{$datos['celular_abogado']}}</div>
   @endisset
   @isset($datos['correo_abogado'])
   <div><label><b>Correo electrónico<b></label></div>
   <div>{{$datos['correo_abogado']}}</div>
   @endisset
   @isset($datos['poder_abogado'])
   <div><label><b>Anexa poder especial: <b></label></div>
   <div>{{$datos['poder_abogado']}}</div>
   @endisset
   @isset($datos['representado_actualmente_jep'])
   <div><label><b>Representado actualmente por la JEP: <b></label></div>
   <div>{{$datos['representado_actualmente_jep']}}</div>
   @endisset
   @isset($datos['nombre_abogado'])
     <div><label><b>Nombre del abogado:<b></label></div>
     <div>{{$datos['nombre_abogado']}} {{$datos['nombre2_abogado']}} {{$datos['apellido1_abogado']}} {{$datos['apellido2_abogado']}}</div>
     @endisset
     @isset($datos['direccion_abogado'])
     <div><label><b>Dirección de notificación<b></label></div>
     <div>{{$datos['direccion_abogado']}}</div>
     @endisset
     @isset($datos['telefono_abogado'])
     <div><label><b>Teléfono de contacto<b></label></div>
     <div>{{$datos['telefono_abogado']}}</div>
     @endisset
     @isset($datos['celular_abogado'])
     <div><label><b>Celular de contacto<b></label></div>
     <div>{{$datos['celular_abogado']}}</div>
     @endisset
     @isset($datos['correo_abogado'])
     <div><label><b>Correo electrónico<b></label></div>
     <div>{{$datos['correo_abogado']}}</div>
     @endisset
     @isset($datos['manifiesta_interes'])
     <div><label><b>Manifiesta su interés en ser representado/a por un abogado común del Sistema Autónomo de Asesoría y Representación Legal de la JEP?<b></label></div>
     <div>{{$datos['manifiesta_interes']}}</div>
     @endisset
     @isset($datos['voluntad_actuar_solo'])
     <div><label><b>Manifiesta su voluntad de actuar por sí mismo/a en el proceso ante la JEP? <b></label></div>
     <div>{{$datos['voluntad_actuar_solo']}}</div>
     @endisset
     @isset($datos['medio_representacion'])
     <div><label><b>Por favor, indique qué otro medio de representación judicial usará: <b></label></div>
     <div>{{$datos['medio_representacion']}}</div>
     @endisset


     <h4 class="headline mb-0">Protección y seguridad</h4>
     @isset($datos['riesgo_seguridad'])
   <div><label><b>¿Las víctimas solicitantes tienen alguna razón para temer por su seguridad, integridad, dignidad o bienestar actualmente, o identifica riesgos por el inicio de este proceso de acreditación ante la Jurisdicción Especial para la Paz? <b></label></div>
   <div>{{$datos['riesgo_seguridad']}}</div>
   @endisset
   @isset($datos['razones_riesgo_seguridad'])
 <div><label><b>¿Cuáles son las razones? <b></label></div>
 <div> {{$datos['razones_riesgo_seguridad']}}</div>
 @endisset
 @isset($datos['autoriza_notificacion'])
 <div><label><b>¿Autoriza a ser notificado de las actuaciones de este caso por medios electrónicos? <b></label></div>
 <div>{{$datos['autoriza_notificacion']}}</div>
 @endisset
</div>
</body>
</html>
