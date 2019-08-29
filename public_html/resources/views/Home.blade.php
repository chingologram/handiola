@extends('Layouts/_layout')

@section('wrapper')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="../../../public/css/frase.css">
<script src="../../../public/js/datetimepicker.js"></script>
<link rel="stylesheet" href="../../../public/css/datetimepicker.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkfRCQbeJ5ydJOPMnqQuscHsSHRoxg7Q&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="public/{{ mix('js/home.js') }}"></script>

<style >
#modalReserva .row+.row>* {
  padding: 10px;
}
.nav-link{
  padding: 0px;
}

</style>


<script type="text/javascript">


function initauto(){


    console.log(123)
    var input = document.getElementById('direccion_alojamiento');
    var input2=document.getElementById('direccion_llave');
    var southWest = new google.maps.LatLng( -34.71661,-58.57973);
    var northEast = new google.maps.LatLng( -34.51147,-58.32847);
    var cabaBounds = new google.maps.LatLngBounds( southWest, northEast );
    var autocomplete = new google.maps.places.Autocomplete(input,{types: ['geocode'], bounds: cabaBounds, strictBounds: true});

    google.maps.event.addListener(autocomplete, 'place_changed', function(){
        var place = autocomplete.getPlace();
    });
    var autoComplete2 = new google.maps.places.Autocomplete(input2,{bounds: cabaBounds, types: ['geocode'], strictBounds: true});

    google.maps.event.addListener(autoComplete2, 'place_changed', function(){
        var place = autoComplete2.getPlace();
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
            console.log(response);
        }
      });
  //    return ;
//  return respuesta;
}

function GuardarReserva(){
  var validacion=validarReserva();
  if(validacion=='OK'){

    var fecha_desde="";
      if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
         || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-     |hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-       |on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
                fecha_desde=$('#fecha_desde').val();
     }else{
       fecha_desde=$('#fecha_desdeA span').html();
     }

    var fecha_hasta=$('#fecha_hasta').val();
    var habiacion=$('#cantidad_habitaciones').val();
    var banos=$('#cantidad_banos').val();
    calcularReserva();
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

      if($('#llave').val()!='si'){
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
                           closeNav();
                           swal('Error!','Error al intentar Guardar la Reserva Intente nuevamente.','error')
                           .then((value) => {
                              openNav();
                                 });
                        }else{
                          closeNav();
                          pagos(response);
                        }
                     }
                   });

             } else{
                 closeNav();
               swal('Lo lamentamos','No ofrecemos el servicio en tu zona. Si desea comuniquese a los telefonos de contacto.','info')
               .then((value) => {
                  openNav();
                     });
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
                     closeNav();
                     swal('Error','Error al intentar Guardar la Reserva Intente nuevamente.','error')
                     .then((value) => {
                        openNav();
                           });
                  }else{
                     closeNav();
                    pagos(response);
                  }
                }
              });
        }else{
           closeNav();
          swal('Lo lamentamos','No ofrecemos el servicio en tu zona. Si desea comuniquese a los telefonos de contacto.','info')
          .then((value) => {
             openNav();
                });
        }
      }

  }else{
     closeNav();
    swal('Error',validacion,'error')
    .then((value) => {
       openNav();
          });
  }
}
function pagos(response){
  swal({
      title: "¿Deseas Pagar Ahora?",
      text: "Tu Reserva a sido Guardada con exito!",
      icon: "warning",
      buttons: ["Pagar despues", "Pagar ahora"],
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

  if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
     || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-     |hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-       |on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
       if($('#fecha_desde').val()==''){
         respuesta+='Falta Completar Fecha de inicio en la reserva.\n';
       }else{
         if($('#fecha_hasta').val()==''){
           respuesta+='Falta Completar Fecha de culminación de la reserva.\n';
         }else{
           var ini=$('#fecha_desde').val();
           var fin=$('#fecha_hasta').val();
           if(ini==fin){
             respuesta+="La fecha de inicio no puede coincidir con la de culminación de la reserva.\n";
           }else{
             var desde = new Date(ini);
             var hasta= new Date(fin);
             var mindate=moment().add(2, 'days');
             if(desde>hasta){
               respuesta+="La fecha de culminación no debe ser inferior a la fecha de reserva.\n";
             }if(desde<mindate){
               respuesta+="Lo lamentamos no se puede reservar con menos de 48 horas de anticipación. Por favor contactarse al telefono y correos para verificar disponibilidad.\n";
             }
           }
         }
       }
 }else{
   if($('#fecha_desdeA span').html()==''){
     respuesta+='Falta Completar Fecha de inicio en la reserva.\n';
   }else{
     if($('#fecha_hasta').val()==''){
       respuesta+='Falta Completar Fecha de culminación de la reserva.\n';
     }else{
       var ini=$('#fecha_desdeA span').html();
       var fin=$('#fecha_hasta').val();
       if(ini==fin){
         respuesta+="La fecha de inicio no puede coincidir con la de culminación de la reserva.";
       }else{
         var desde = new Date(ini);
         var hasta= new Date(fin);
         var mindate=moment().add(2, 'days');
         if(desde>hasta){
           respuesta+="La fecha de culminación no debe ser inferior a la fecha de reserva.";
         }
         if(desde<mindate){
           respuesta+="Lo lamentamos no se puede reservar con menos de 48 horas de anticipación. Por favor contactarse al telefono y correos para verificar disponibilidad.\n";
         }
       }
     }
   }
 }

  if($('#fecha_hasta').val()==''){
    respuesta+='Falta Completar Fecha de culminación de la reserva.\n';
  }
  if($('#cantidad_habitaciones').val()==''){
    respuesta+='Falta Completar Cantidad de Habitaciones.\n';
  }
  if($('#cantidad_banos').val()==''){
    respuesta+='Falta Cargar Cantidad de Baños\n';
  }
  if($('#costo_total').val()==''){
    respuesta+='No se a podido obtener el costo del servicio, intente Nuevamente\n';
  }
  if($('#direccion_alojamiento')==''){
    respuesta+='Falta Completar la Direccion del Alojamiento.\n';
  }
  if($('#llave').val()!='si'){
    if($('#fecha_llave').val()==''){
      respuesta+='Falta completar la Fecha para retirar la Llave. \n';
    }
    if($('#direccion_llave').val()==''){
      respuesta+='Falta Completar Direccion para retirar la Llave \n';
    }
  }
  if($('#reservante').val()==''){
    respuesta+='Falta Incluir el nombre del huesped.\n';
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
  var fecha_desde="";
  if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
     || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-     |hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-       |on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
      fecha_desde=$('#fecha_desde').val();
   }else{
      fecha_desde=$('#fecha_desdeA span').html();
    }

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

      function llave(){
        if($('#llave').val()=='si'){
          $('.infoLlave').fadeOut();
        }else{
          $('.infoLlave').fadeIn();
        }
      }
      function getDolar(){
        $.ajaxSetup({
                   headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                   });
                   var data="costo=1";
            $.ajax({
              url:'get_price',
              data:data,
              type:'POST',
              success: function(response){
                response=parseFloat(response);
                 $('#Dolar').html('Cambiar Dolar ($'+response.toFixed(2)+')');
              }});
      }



    $(document).ready(function(){

        var reservaChangeHandler = function() {
            var result = validarReserva();
            if (result != "OK") {
                $('.overlay .errors').html(result.nl2br()).css({opacity: 1});
                $('#GuardarReserva').attr('disabled', 'disabled');
            } else {
                $('#GuardarReserva').attr('disabled', null);
                $('.overlay .errors').empty().css({opacity: 0});
            }
        }

      @if(empty($reserva))

      @else
      swal('operación Exitosa','Tu Pago de ${{$reserva->costo_total}} por la reserva Nº {{$reserva->no_reserva}} ha sido confirmado.','success');
      @endif

      @if(Auth::check())
        @if(auth()->user()->telefono_movil=='')
           swal({
             text: 'No tenemos tu telefono registrado, por favor ingresa tu telefono.',
             content: "input",
             button: {
               text: "Guardar!",
               closeModal: false,
             },
           })
          .then(name => {
            if (!name) throw null;
            return fetch(`set_telefono?id={{auth()->user()->id}}&telefono_movil=`+name);
          })
          .then(results => {
            return results.json();
          })
          .then(json => {
            const user = json;
                console.log(json);
            swal({
              title: "Operación Exitosa:",
              text: "Telefono Guardado",
            });
          })
          .catch(err => {
            if (err) {
              swal("Oh no!", "El servidor tiene un error!", "error");
            } else {
              swal.stopLoading();
              swal.close();
            }
          });
        @endif
      @endif
      $.ajaxSetup({
                 headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                 });
                 var data="costo=1";
          $.ajax({
            url:'get_status',
            data:data,
            type:'POST',
            success: function(response){
            console.log(response);
            }});

      getDolar();
      $('.infoLlave').fadeOut();
      var address=[];
      initauto();
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
           || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-     |hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-       |on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
            $('.datepic').removeClass('datepicker');
            $('.datepic').removeAttr("type");
            $('.datepic').prop('type', 'date');
            <?php
            $today=date('Y-m-d');
            $femin = strtotime($today.'+ 2 days');
            $feminimo=date("Y-m-d",$femin);

            $fehas = strtotime($today.'+ 3 days');
            $fehasta=date("Y-m-d",$fehas);

            ?>
            $('#fecha_desde').attr('min','<?php echo $feminimo;?>');
            $('#fecha_hasta').attr('min','<?php echo $fehasta; ?>');
            $('#fecha_llave').attr('min','<?php echo date('Y-m-d'); ?>')
        } else {

            $('#fecha_desdeA').dateTimePicker({
              dateFormat: "YYYY-MM-DD",
              locale: 'es',
              showTime: false,
              selectData: "now",
              positionShift: {top:-190, left: -50},
              title: "Seleccione una Fecha",
              buttonTitle: "Seleccionar",
              onSelect:  reservaChangeHandler
            });

            $('.fecha_hasta').dateTimePicker({
                dateFormat: "YYYY-MM-DD",
                locale: 'es',
                showTime: false,
                selectData: moment().add(2, 'days'),
                min: moment().add(2, 'days'),
                positionShift: { top: -190, left: -50},
                title: "Seleccione una fecha",
                buttonTitle: "Seleccionar",
                onSelect:  reservaChangeHandler
            });

            $('#fecha_llaveA').dateTimePicker({
                dateFormat: "YYYY-MM-DD",
                locale: 'es',
                showTime: false,
                selectData: "now",
                positionShift: { top: -190, left: -50},
                title: "Seleccione una fecha",
                buttonTitle: "Seleccionar",
                onSelect:  reservaChangeHandler
            });

        }

       $('#enviarForm').click(function(){
         var nombre=$('#nombre').val();
         var correo=$('#correo').val();
         var telefono=$('#telefono').val();
         var mensaje=$('#mensaje').val();

         var data="nombre="+nombre+"&correo="+correo+"&telefono="+telefono+"&mensaje="+mensaje;

         $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                    });

             $.ajax({
               url:'/enviar_formulario',
               data:data,
               type:'POST',
               success: function(response){
                   swal('Formulario Enviado','Nos pondremos en contacto con tigo a la brevedad.','success');
               }
             });
       });
              $('#crearReserva').click(function(){
              // document.location.href="Reserva";
                openNav();
              });

              $('#GuardarReserva').click(function(){
    validarDirreccion1();
    validarDirreccion2();
    GuardarReserva();
  });
  $('#optionDolar').change(function(){
    var op=$('#optionDolar').val();
    if(op=='0'){
      $('#valorDolar').val('0.00');
    }
    if(op=='dolarof'){
    $('#valorDolar').val('0.00');
    }
    if(op=='dolarper'){
         $('#valorDolar').val('0.00');
    }
  });
  $('#GuardarCambios').click(function(){
    var fecha_desde=$('#fecha_desde1').val();
    var fecha_hasta=$('#fecha_hasta1').val();
    var habiacion=$('#cantidad_habitaciones1').val();
    var banos=$('#cantidad_banos1').val();
    var costo_total=$('#costo_total1').val();
    var direccion_alojamiento=$('#direccion_alojamiento1').val();
    var hora_llave=$('#hora_llave1').val();
    var fecha_llave=$('#fecha_llave1').val();
    var direccion_llave=$('#direccion_llave1').val();
    var reservante=$('#reservante1').val();

    var desde = new Date(fecha_desde);
    var hasta= new Date(fecha_hasta);
    var desdeDay = desde.getDate();
    var hastaDay = hasta.getDate();
    var dias=hastaDay-desdeDay;
    var id=$('#control_id').val();

    var data="cantidad_habitaciones="+habiacion+"&cantidad_banos="+banos+
    "&fecha_desde="+fecha_desde+"&fecha_hasta="+fecha_hasta+
    "&costo_total="+costo_total+"&direccion_alojamiento="+direccion_alojamiento+"&hora_llave="+hora_llave+
    "&fecha_llave="+fecha_llave+"&direccion_llave="+direccion_llave+"&reservante="+reservante+"&numero_dias="+dias+'&id='+id;
    $.ajaxSetup({
               headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
               });

        $.ajax({
          url:'GuardarCambios',
          data:data,
          type:'POST',
          success: function(response){
               swal('Exito','Cambios Guardados','success');
          }
        });

  });
  $('#direccion_alojamiento').change(function(){
    validarDirreccion1();
    calcularReserva();
  });
  $('#direccion_llave').change(function(){
    validarDirreccion2();
    calcularReserva();
  });
    $('#fecha_desde').change(function(){
      /*  var desde=$('#fecha_desde').val();
        $("#fecha_hasta").attr({ "min" : desde});
        $('#fecha_hasta').val(desde);
        $('#fecha_hasta').attr({"disabled":false});*/
    });

    $( "#direccion_alojamiento" ).keypress(function() {
      var input=$('#direccion_alojamiento').val();
  });

 $('#Dolar').click(function(){
     $('#modalDolar').modal('show');
 });
 $('#GuardarDolar').click(function(){
       var optionDolar=$('#optionDolar').val();
       var valorDolar=$('#valorDolar').val();
       if(optionDolar!=0&&valorDolar!=''){
         var data="optionDolar="+optionDolar+"&valorDolar="+valorDolar;
         $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     }
                    });

             $.ajax({
               url:'setDolar',
               data:data,
               type:'POST',
               success: function(response){
                    swal('Exito','Cambios Guardados','success');
                    document.location.href="Reservas";
               }
             });
       }else{
         swal('Error','Debe Seleccionar una opción valida','error');
       }
 });   
    });

    function verReserva(id){
      limpiarform();
      $.ajaxSetup({
                 headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                 });
                 var data="id="+id;
          $.ajax({
            url:'get_reserva',
            data:data,
            type:'POST',
            success: function(response){
                 loadData(response);
            }});
    }
    function loadData(response){
      $('#fecha_desde1').val(response.fecha_desde);
      $('#fecha_hasta1').val(response.fecha_hasta);
      $('#cantidad_habitaciones1').val(response.cantidad_habitaciones);
      $('#cantidad_banos1').val(response.cantidad_banos);
      $('#costo_total1').val(response.costo_total);
      $('#direccion_alojamiento1').val(response.direccion_alojamiento);
      $('#hora_llave1').val(response.hora_llave);
      $('#fecha_llave1').val(response.fecha_llave);
      $('#direccion_llave1').val(response.direccion_llave);
      $('#reservante1').val(response.reservante);
      $('#control_id').val(response.id);
      $('#modalReserva').modal('show');
    }
    function limpiarform(){
      $('#fecha_desde1').val('');
      $('#fecha_hasta1').val('');
      $('#cantidad_habitaciones1').val('');
      $('#cantidad_banos1').val('');
      $('#costo_total1').val('');
      $('#direccion_alojamiento1').val('');
      $('#hora_llave1').val('');
      $('#fecha_llave1').val('');
      $('#direccion_llave1').val('');
      $('#reservante1').val('');
    }
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
</script>
<div id="myNav" class="overlay" style="background-color: rgba(168,5,54,0.9);">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <style media="screen">
         .in-sti{
         outline: none;
         box-shadow:none !important;
         border-bottom:1px solid #ccc !important;
         background: transparent;

         height: 25%;
         border: none;
         outline: none;

         font-size: 30px;
         color: white;
         }
         .sel{
           font-size: 30px;
           outline: none;
           box-shadow:none !important;
           border-bottom:1px solid #ccc !important;
           background: transparent;
         }
         .sel option {
           font-size: 30px;
           outline: none;
           box-shadow:none !important;
           border-bottom:1px solid #ccc !important;
             margin: 40px;
             background: rgba(168,5,54,0.9);
             border-radius: 2px 1px;
             color: #fff;
             text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
         }
         .sel option:hover{
           background-color: red;
         }
         .dropdown-menu{
           z-index: 100000000000000000000000000;
         }

           .dtp_modal-content-no-time{
             z-index: 1000000000000000000000000000;
           }
           .dtp_modal-win{
             z-index: 100000000000000000000000000;
           }
           .pac-container {
                      z-index: 1000000000000000000000000000;
           }
           #fecha_desdeA span{
             display: inline;;
           }
    </style>
    <input type="hidden" id="locacion" name="" value="">
    <input type="hidden" id="locacionllaves" name="" value="">

      <div class="container">
<div class="frase">
            Mi alojamiento de
               <select class="sel" onchange="calcularReserva();" id="cantidad_habitaciones" name="" style="color:white;border: none;outline: none;width:10em;height: 40px;display:inline;">
                  <option value="0">Cant. de Camas</option>
                  <option value="1">1 Cama</option>
                  <option value="2">2 camas</option>
                  <option value="3">3 camas</option>
                  <option value="4">4 camas</option>
                  <option value="5">+5 camas</option>
               </select>
                    Y
               <select id="cantidad_banos" class="sel" onchange="calcularReserva();" name="" style="color:white;border: none;outline: none;width:10em;height: 40px;display:inline;">
                  <option value="0">Cant. de Baños</option>
                  <option value="1">1 Baño</option>
                  <option value="2">2 Baños</option>
                  <option value="3">3 Baños</option>
                  <option value="4">4 Baños</option>
                  <option value="5">+5 Baños</option>
               </select>
               , ubicado en
               <input id="direccion_alojamiento" onchange="calcularReserva();" style="color:white;border: none;outline: none;width:350px;height: 40px;display:inline;" type="text" class="in-sti">
               ,esta reservado del
               <div class="in-sti" id="fecha_desdeA" style="color:white;border:none;outline: none;width:50px;height:40px;display:inline;"></div>
               <input type="hidden" id="fecha_desde" class="datepicker in-sti datepic" onchange="calcularReserva();" style="color:white;border:none;outline:none;width: 300px;height: 40px;display:inline;" type="text" >
              hasta el
              <div class="fecha_hasta in-sti " style="color:white;border: none;outline: none;width:50px;height: 40px;display:inline;"></div>
              <input type="hidden"  id="fecha_hasta" class="datepicker in-sti datepic" onchange="calcularReserva();"  style="color:white;border: none;outline: none;width:300px;height: 40px;display:inline;" type="text"/>
              por
              <input id="reservante" placeholder="Nombre del huésped" onchange="calcularReserva();" style="color:white;border: none;outline: none;width:12em;height: 40px;display:inline;" type="text" class="in-sti" >
             . Tenemos tu llave?
             <select class="sel" id="llave" onchange="llave(); calcularReserva();" name="" style="color:white;border: none;outline: none;width:175px;height: 40px;display:inline;">
                <option value="si">Si</option>
                <option value="no">No</option>
             </select>
             <br>
             <div class="infoLlave">
               <br>
               Busquen la llave en
               <input id="direccion_llave" onchange="calcularReserva();" style="color:white;border: none;outline: none;width:350px;height: 40px;display:inline;" type="text" class="in-sti" >
                el
                <div id="fecha_llaveA" class="in-sti" style="color:white;border: none;outline: none;width:50px;height: 40px;display:inline;"></div>
               <input  id="fecha_llave" type="hidden" class="datepicker in-sti datepic" onchange="calcularReserva();"  style="color:white;border: none;outline: none;width:300px;height: 40px;display:inline;" type="text"/>
                entre las
                <select id="hora_llave" class="sel"  onchange="calcularReserva();" name="" style="color:white;border: none;outline: none;width:250px;height: 40px;display:inline;">
                    <option value="8:00 y 10:00">8:00 y 10:00</option>
                    <option value="10:00 y 12:00">10:00 y 12:00</option>
                    <option value="12:00 y 14:00">12:00 y 14:00</option>
                    <option value="14:00 y 16:00">14:00 y 16:00</option>
                    <option value="16:00 y 18:00">16:00 y 18:00</option>
                    <option value="18:00 y 20:00">18:00 y 20:00</option>
                </select>
                horas.
             </div>

<!--
             <a class="in-sti" style="top:-100px;position:relative;color:lightblue;border: none;outline: none;width:250px;height: 40px;display:inline;" href="terminos_y_condiciones" target="_blank">  Ha leido los Terminos y condiciones?</a>
               <select class="sel" id="terminos" name="" style="text-decoration: none;top:-100px;position:relative;color:white;border: none;outline: none;width:250px;height: 40px;display:inline;">
                 <option value="0">Seleccionar</option>
                 <option value="1">Si Lei y Acepto los Terminos y Condiones.</option>
               </select><br>
-->
            
             <div class="monto">
                 Monto:&nbsp;<input id="costo_total"  style="color:white;border: none;outline: none;width:200px;height: 40px;display:inline;" type="text" class="in-sti" disabled>&nbsp;ARS
             </div>
            
                        

</div><a style="position:relative;color:white;">
               <button type="button" id="GuardarReserva" disabled="disabled" style="font-size: 25px;" class="button special" name="button">Reservar Ya</button>
            </a>
            <div class="errors"></div>
            <div class="terms">
                <small>
                    Al hacer clic aceptas los <a target="_blank" href="/terminos_y_condiciones">Términos y Condiciones de Uso y Política de Privacidad</a>                </small>
            </div>
     </div>
  </div>
</div>

<div class="site-index">

  <section id="banner">
       <div class="inner">
           <img src="../../../public/template/images/br.png" alt="">
         <p><a style="color:white;font-weight:bold;">Tenés tu departamento en alquiler temporario o Airbnb en Buenos Aires</a> <br><a style="font-weight:bold;color:white;"> ¿Querés aumentar tus ingresos sin ocuparte de las gestiones?</a></p>
         <ul class="actions">
           @if (Auth::check())
              <li><a href="javascript:openNav();" class="button big special">Reservar Ya</a></li>
           @else
               <li><a href="registro" class="button big special">Reservar Ya</a></li>
           @endif


         </ul>
       </div>
     </section>

    <div class="body-content">

      <section id="one" class="wrapper style1">
     				<header class="major">
     					<h2>Handiola</h2>
     					<h2>NUESTROS BENEFICIOS</h2>
     				</header>
     				<div class="container">
     					<div class="row">
     						<div class="3u">
     							<section class="special box">
     								<i class="icon"><img src="../../../public/template/images/Tiempo.png" width='100px' alt=""></i><br>
     								<h3>Ahorrá tiempo.</h3>
                    <li>Recibí el status de las tareas que vamos realizando.</li>
                     <li>Si tenés alguna incidencia, la solucionaremos.</li>
                     <li>Disfrutá de tu tiempo libre mientras generás más ingresos.</li>
     							</section>
     						</div>
     						<div class="3u">
     							<section class="special box">
     								<i class="icon"><img src="../../../public/template/images/Gestiones.png" width='100px' alt=""></i>
     								<h3>Olvidate de las gestiones.</h3>
                    <li>Recibiremos y despediremos a tus huéspedes.</li>
                     <li>Tenemos Check Ins/outs flexibles.</li>
                     <li>Dejá limpieza, blanquería y lavandería en nuestras manos.</li>
     							</section>
     						</div>
     						<div class="3u">
     							<section class="special box">
     								<i class="icon"><img src="../../../public/template/images/Seguridad.png" width='100px' alt=""></i>
     								<h3>La seguridad primero.</h3>
                    <li>Nuestro equipo pasó por un duro proceso de reclutamiento.</li>
                    <li>Hacemos chequeos de seguridad antes y después de cada reserva.</li>
                    <li>Mantenemos los más altos estándares de protección.</li>
     							</section>
     						</div>
     						<div class="3u">
     							<section class="special box">
     								<i class="icon"><img src="../../../public/template/images/Host.png" width='100px' alt=""></i>
     								<h3>Aumentá tus ingresos.</h3>
                    <li>Obtené las mejores evaluaciones.</li>
                    <li>Con nuestra experiencia en la industria serás el mejor anfitrión.</li>
                    <li>Sabemos que contás con nosotros y siempre vamos a cumplirte.</li>
     							</section>
     						</div>
     					</div>
     				</div>
     			</section>
                        <section id="servicios" class="wrapper style2">
     				<header class="major">
     					<h2>NUESTROS SERVICIOS</h2>
     				</header>
     				<div class="container">
     					<div class="row">
                                                <div class="6u">
                                                    @include('togo')
                                                    <a id="open-nav" href="javascript:void(0)">
                                                        <button class="button special">Reserva To-Go</button>
                                                    </a>
     						</div>
                                                <div class="6u">
                                                    @include('plus')
                                                    <a href="/contacto">
                                                        <button class="button special">Reserva Plus</button>
                                                    </a>
     						</div>
     					</div>
     				</div>
     			</section>

     		<!-- Two -->
     			<section id="two" class="wrapper style2">
     				<header class="major">
     					<h2>Conocenos</h2>
     					<h2>¿Quiénes están detrás de Handiola?</h2>
     				</header>
     				<div class="container">
     					<div class="row">
     						<div class="4u">
     							<section class="special">
     								<a href="#" class="image fit"><img src="../../../public/template/images/juan.png" alt=""></a>
     								<h3>Juan Pablo Herrera</h3>
                    <p align="justify">Juanpa pone a disposición de los anfitriones toda su expertise en operación
hotelera. Le gusta conectar personas y quiere que los huéspedes se sientan
en casa y adoren Buenos Aires tanto como él lo hace.</p>
                    <ul class="actions">

     								</ul>
     							</section>
     						</div>
     						<div class="4u">
     							<section class="special">
     								<a href="#" class="image fit"><img src="../../../public/template/images/majo.png" alt=""></a>
     								<h3>María José Ovalles</h3>
                    <p align="justify">Majo, sabe que la acción creativa de Handiola es lograr que los usuarios
lleguen a ser todo lo que desean ser. Ella ama a los anfitriones que permiten
a los turistas sumergirse en la experiencia local.</p>
                    <ul class="actions">

     								</ul>
     							</section>
     						</div>
     						<div class="4u">
     							<section class="special">

     								<a href="#" class="image fit"><img src="../../../public/template/images/dan.png" alt=""></a>
     								<h3>Daniel Figueroa</h3>
                    <p align="justify">Siempre orientado a la comunicación y seguridad virtual, tras desarrollar
productos y apps para empresas globales, ahora Dani, busca humanizar la
tecnología para que huéspedes y hosts sean más felices.</p>
                    <ul class="actions">

     								</ul>
     							</section>
     						</div>
     					</div>
     				</div>
     			</section>
          <section id="three" class="wrapper style1">
            <div class="container">
                    <h1 style="align:center;">Contactanos</h1>
                   <label for="">Llamanos: <strong style="color:black;">11-61860830</strong> o Completa el siguiente Formulario:</label>
                   <div class="row">
                   <div class="6u">
                      <label for="">Nombre</label>
                      <input type="text" name="" id="nombre" value="" placeholder="¿Cómo te llamas?">
                   </div>
                   <div class="6u">
                     <label for="">Corre Electronico</label>
                     <input type="text" id="correo" value="" placeholder="¿Cuál es tu correo?">
                   </div>
                   </div>
                   <div class="row">
                      <div class="12u">
                         <label for="">Telefono</label>
                         <input type="text" id="telefono" value="">
                      </div>
                   </div>
                   <div class="row">
                      <div class="12u">
                          <label for="">Mensaje</label>
                          <textarea name="name" id="mensaje" rows="4" cols="80" placeholder="¿En qué podemos ayudarte? ¿Preferís que te llamemos? Indicanos la hora más conveniente para vos."></textarea>
                      </div>
                   </div>
                   <br>
                   <div class="row">
                     <div class="6u">
                       <button type="button" id="enviarForm" class="button special" name="button">Enviar</button>
                     </div>
                  </div>
              </div>
             </section>
    </div>
</div>
@endsection
<style>
  #skel-layers-hiddenWrapper{
    width: 0%;
    height: 0%;
    display: none;
  }

</style>
