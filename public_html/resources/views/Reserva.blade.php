@extends('Layouts/_layout')

@section('wrapper')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../../../public/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="../../../public/js/jquery.auto-complete.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../../public/css/jquery.auto-complete.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkfRCQbeJ5ydJOPMnqQuscHsSHRoxg7Q&libraries=places"></script>
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
<style media="screen">
  .row{
    padding: 5px;
  }
  .nav-link{
    padding: 0px;
  }

</style>
<script>

function initauto(){


  var input = document.getElementById('direccion_alojamiento');
  var input2=document.getElementById('direccion_llave');
       var autocomplete = new google.maps.places.Autocomplete(input,{types: ['geocode']});
       google.maps.event.addListener(autocomplete, 'place_changed', function(){
          var place = autocomplete.getPlace();
       });
       var autoComplete2 = new google.maps.places.Autocomplete(input2,{types: ['geocode']});
       google.maps.event.addListener(autocomplete, 'place_changed', function(){
          var place = autocomplete.getPlace();
       });
}
function validarDirreccion1(){
  var input=$('#direccion_alojamiento').val();
  var respuesta="";
  $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
             });
             var data="input="+input;
      $.ajax({
        url:'get_locations',
        data:data,
        type:'POST',
        success: function(response){
            $('#locacion').val(response);
        }
      });
  //    return ;
//  return respuesta;
}

function GuardarReserva(){
  var validacion=validarReserva();
  if(validacion=='OK'){

    var fecha_desde=$('#fecha_desde').val();
    var fecha_hasta=$('#fecha_hasta').val();
    var habiacion=$('#cantidad_habitaciones').val();
    var banos=$('#cantidad_banos').val();
    var costo_total=$('#costo_total').val();
    var direccion_alojamiento=$('#direccion_alojamiento').val();
    var hora_llave=$('#hora_llave').val();
    var fecha_llave=$('#fecha_llave').val();
    var direccion_llave=$('#direccion_llave').val();
    var reservante=$('#reservante').val();

    var desde = new Date(fecha_desde);
    var hasta= new Date(fecha_hasta);
    var desdeDay = desde.getDate();
    var hastaDay = hasta.getDate();
    var dias=hastaDay-desdeDay;

    var data="cantidad_habitaciones="+habiacion+"&cantidad_banos="+banos+
    "&fecha_desde="+fecha_desde+"&fecha_hasta="+fecha_hasta+
    "&costo_total="+costo_total+"&direccion_alojamiento="+direccion_alojamiento+"&hora_llave="+hora_llave+
    "&fecha_llave="+fecha_llave+"&direccion_llave="+direccion_llave+"&reservante="+reservante+"&numero_dias="+dias;

      var validarDirreccionalojamiento=$('#locacion').val();
      var validarDirreccionllave=$('#locacionllaves').val();

      if($('#llave').val()!='Si'){
             //var validarDirreccionllave=validarDirreccion2();
             if(validarDirreccionllave=="OK"&&validarDirreccionalojamiento=="OK"){
               $.ajaxSetup({
                          headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           }
                          });

                   $.ajax({
                     url:'save_reserva',
                     data:data,
                     type:'POST',
                     success: function(response){
                        if(response==0){
                           swal('Error!','Error al intentar Guardar la Reserva Intente nuevamente.','error');
                        }else{

                          pagos(response);
                        }
                     }
                   });

             } else{

               swal('Lo lamentamos!','No ofrecemos el servicio en tu zona.','info');
             }
      }else{
        if(validarDirreccionalojamiento=="OK"){
          $.ajaxSetup({
                     headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                     });
//                      var data="input="+input;
              $.ajax({
                url:'save_reserva',
                data:data,
                type:'POST',
                success: function(response){
                  if(response==0){
                     swal('Error!','Error al intentar Guardar la Reserva Intente nuevamente.','error');
                  }else{
                    pagos(response);
                  }
                }
              });
        }else{
          swal('Lo lamentamos!','No ofrecemos el servicio en tu zona.','info');
        }
      }

  }else{
    swal('Error!',validacion,'error');
  }
}
function pagos(response){
  swal({
      title: "¿Deseas Pagar Ahora?",
      text: "Tu Reserva a sido Guardada con exito!",
      icon: "warning",
      buttons: ["Pagar despues", "Deseo pagar el Servicio!"],
      dangerMode: true,
       })
      .then((willDelete) => {
        if (willDelete) {
              document.location.href=response;
        }else{
          document.location.href="/";
        }
      });
}
function validarDirreccion2(){
  var input=$('#direccion_llave').val();

  $.ajaxSetup({
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
             });
             var data="input="+input;
      $.ajax({
        url:'get_locations',
        data:data,
        type:'POST',
        success: function(response){
             $('#locacionllaves').val(response);
        }
      });
}

function validarReserva(){
  var respuesta='';
  if($('#fecha_desde').val()==''){
    respuesta+='Falta Cargar Fecha en que inicia Reserva\n';
  }
  if($('#fecha_hasta').val()==''){
    respuesta+='Falta Cargar Fecha en que finaliza Reserva\n';
  }
  if($('#cantidad_habitaciones').val()==''){
    respuesta+='Falta Cargar Cantidad de Habitaciones\n';
  }
  if($('#cantidad_banos').val()==''){
    respuesta+='Falta Cargar Cantidad de Baños\n';
  }
  if($('#costo_total').val()==''){
    respuesta+='No se a podido obtener el costo del servicio, intente Nuevamente\n';
  }
  if($('#direccion_alojamiento')==''){
    respuesta+='Falta Cargar Direccion de Alojamiento\n';
  }
  if($('#llave').val()!='Si'){
    if($('#fecha_llave').val()==''){
      respuesta+='Falta Cargar Fecha para recoger la Llave \n';
    }
    if($('#direccion_llave').val()==''){
      respuesta+='Falta Cargar Direccion para recoger la Llave \n';
    }
  }
  if($('#reservante').val()==''){
    respuesta+='Falta Cargar Reservante\n';
  }
  if($('#terminos').val()==0){
    respuesta+='Debe Aceptar Terminos y Condiciones \n';
  }
  if(respuesta==''){
    respuesta="OK";
  }

  return respuesta;
}
function calcularReserva(){

  var fecha_desde=$('#fecha_desde').val();
  var fecha_hasta=$('#fecha_hasta').val();
  var habiacion=$('#cantidad_habitaciones').val();
  var banos=$('#cantidad_banos').val();
  var costo_total=$('#costo_total').val();
  var direccion_alojamiento=$('#direccion_alojamiento');
  var hora_llave=$('#hora_llave').val();
  var fecha_llave=$('#fecha_llave').val();
  var direccion_llave=$('#direccion_llave').val();
  var reservante=$('#reservante').val();

  if(fecha_desde!=''&&fecha_hasta!=''&&habiacion!=''&&banos!=''){
    var desde = new Date(fecha_desde);
    var hasta= new Date(fecha_hasta);
    var desdeDay = desde.getDate();
    var hastaDay = hasta.getDate();
    var dias=hastaDay-desdeDay;
    var costoDias=0;
    var costoHabitacion=0;
    var costoBano=0;
    if(dias>0&&dias<6){
       costoDias=15;
       costoHabitacion=2.5*parseFloat(habiacion);
       costoBano=2.5*parseFloat(banos);
    }
    if(dias>5&&dias<11){
        costoDias=20;
        costoHabitacion=4*parseFloat(habiacion);
        costoBano=4*parseFloat(banos);
    }
    if(dias>10){
        costoDias=30;
        costoHabitacion=5*parseFloat(habiacion);
        costoBano=5*parseFloat(banos);
    }
    var costo=costoDias+costoHabitacion+costoBano;
    $.ajaxSetup({
               headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               });
               var data="costo="+costo;
        $.ajax({
          url:'get_price',
          data:data,
          type:'POST',
          success: function(response){
            response=parseFloat(response);
             $('#costo_total').val(response.toFixed(2));
          }});

  }else{

  }
}
function tokenHandler(token){
    console.log(token);
}

$(document).ready(function(){
  var address=[];
  initauto();


    $('#pagarMP').click(function(){
     var d=Mercadopago.setPublishableKey("TEST-e58f2b54-8a21-40d2-8be7-9c67fc0d8139");
      var form=$('#pay');
      Mercadopago.createToken(form, tokenHandler);
    });

  $('#GuardarReserva').click(function(){
    validarDirreccion1();
    validarDirreccion2();
    GuardarReserva();
  });
  $('#direccion_alojamiento').change(function(){
    validarDirreccion1();

  });
  $('#direccion_llave').change(function(){
    validarDirreccion2();

  });
    $('#fecha_desde').change(function(){
        var desde=$('#fecha_desde').val();
        $("#fecha_hasta").attr({ "min" : desde});
        $('#fecha_hasta').val(desde);
        $('#fecha_hasta').attr({"disabled":false});
    });
    $('#reservante').change(function(){
        calcularReserva();
    });
    $( "#direccion_alojamiento" ).keypress(function() {
      var input=$('#direccion_alojamiento').val();
  });
});
</script>
<input type="hidden" id="locacion" name="" value="">
<input type="hidden" id="locacionllaves" name="" value="">

  <div class="container">
      <h1>Calcula el valor de tu Reserva!</h1>

      <p>Por favor complete los siguientes campos:</p>
      <div class="row">
            <div class="6u">
               <label for="">Cantidad de Habitaciones:</label>
               <input type="number" class="form-control" id="cantidad_habitaciones" name="" value="" placeholder="Cantidad de Habitaciones.">
            </div>
            <div class="6u">
              <label for="">Cantidad de Baños:</label>
              <input type="number" name="" value="" class="form-control" id="cantidad_banos" placeholder="Cantidad de Baños.">
            </div>
      </div>
      <div class="row">
          <div class="12u">
            <label for="">Ubicación del inmueble:</label>
            <input id="direccion_alojamiento" type="text" class="form-control" name=""  value="" placeholder="Ubicación">
          </div>
      </div>
      <div class="row">
        <div class="6u">
              <label for="">Inicio de la Reserva: </label>
              <?php
              $today=date('Y-m-d');
              $femin = strtotime($today.'+ 2 days');
              $feminimo=date("Y-m-d",$femin);
              //$date1 = new DateTime('now');
              //$date2 = new DateTime($fevenci); ?>
              <input type="date" name="" min="<?php echo $feminimo; ?>" value="" id="fecha_desde" class="form-control">
        </div>
        <div class="6u">
             <label for="">Fin de la Reserva: </label>
             <input type="date" name="" value="" class="form-control" id="fecha_hasta" disabled>
        </div>
      </div>
      <div class="row">
         <div class="6u">
             <label for="">Reservante:</label>
             <input type="text" name="" value="" class="form-control" name="" id="reservante" placeholder="Nombre del reservante">
         </div>
         <div class="6u">
              <label for="">¿Tenemos tu Llave?</label>
              <select class="" name="" class="form-control" id="llave" name="">
                 <option value="Si">Si</option>
                 <option value="No">No</option>
              </select>
         </div>
      </div>
      <div class="row">
        <div class="12u">
             <label for="">Busquen la Llave en:</label>
             <input type="text" name="" value="" class="form-control" id="direccion_llave" name="" placeholder="Donde quieres que busquemos tu llave.">
        </div>
      </div>
      <div class="row">
           <div class="6u">
              <label for="">Horario:</label>
              <select class="" name="" class="form-control" name="" id="hora_llave">
                  <option value="16:00 y 18:00">16:00 y 18:00</option>
                  <option value="17:00 y 19:00">17:00 y 19:00</option>
                  <option value="18:00 y 20:00">18:00 y 20:00</option>
               </select>
            </div>
            <div class="6u">
               <label for="">El día:</label>
               <input type="date" id="fecha_llave" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="" value="">
            </div>
      </div>


      <div class="row">
          <div class="12u">
               <label for="">Valor de la Reserva:</label>
               <input type="text" name="" value="" id="costo_total" disabled>
          </div>
      </div><br>
      <div class="row">
        <div class="6u">
          <label for="">Ha leido los <a href="terminos_y_condiciones" target="_blank">Terminos y condiciones</a>?</label>
          <select class="" id="terminos" name="">
            <option value="0">Seleccionar</option>
            <option value="1">Si Lei y Acepto los Terminos y Condiones.</option>
          </select>
        </div>
      </div>
      <br>
      <div class="row">
          <div class="12u">

              <button type="button" id="GuardarReserva" class="button special" name="button">Reserva Ya!</button>
          </div>
      </div>
      <div class="row">
         <div class="12u" id="MPago">

         </div>
      </div>
  </div>
<br>



@endsection
