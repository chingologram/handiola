@extends('Layouts/_layout')
@section('wrapper')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="../../../public/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="../../../public/css/frase.css">
<script src="../../../public/js/datetimepicker.js"></script>
<link rel="stylesheet" href="../../../public/css/datetimepicker.css">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbkfRCQbeJ5ydJOPMnqQuscHsSHRoxg7Q&libraries=places"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js" integrity="sha256-xljKCznmrf+eJGt+Yxyo+Z3KHpxlppBZSjyDlutbOh0=" crossorigin="anonymous"></script>
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


    var input = document.getElementById('direccion_alojamiento');
    var input2=document.getElementById('direccion_llave');
    var southWest = new google.maps.LatLng(-58.74252,-34.46411);
    var northEast = new google.maps.LatLng(-58.06068,-34.74669);
    var cabaBounds = new google.maps.LatLngBounds( southWest, northEast );
    var autocomplete = new google.maps.places.Autocomplete(input,{bounds: cabaBounds, types: ['geocode']});
    google.maps.event.addListener(autocomplete, 'place_changed', function(){
        var place = autocomplete.getPlace();
    });
    var autoComplete2 = new google.maps.places.Autocomplete(input2,{bounds: cabaBounds, types: ['geocode']});
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
               swal('Lo lamentamos!','No ofrecemos el servicio en tu zona.','info')
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
        }else{
           closeNav();
          swal('Lo lamentamos!','No ofrecemos el servicio en tu zona.','info')
          .then((value) => {
             openNav();
                });
        }
      }

  }else{
     closeNav();
    swal('Error!',validacion,'error')
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
      buttons: ["Pagar despues", "Pagar Ahora"],
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
    fecha_desde = moment(fecha_desde,'DD-MM-YYYY', 'YYYY-MM-DD');
    fecha_hasta = moment(fecha_hasta,'DD-MM-YYYY', 'YYYY-MM-DD');
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
            $today=date('d-m-y');
            $femin = strtotime($today.'+ 2 days');
            $feminimo=date("d-m-y",$femin);

            $fehas = strtotime($today.'+ 3 days');
            $fehasta=date("d-m-y",$fehas);

            ?>
            $('#fecha_desde').attr('min','<?php echo $feminimo;?>');
            $('#fecha_hasta').attr('min','<?php echo $fehasta; ?>');
            $('#fecha_llave').attr('min','<?php echo date('Y-m-d'); ?>')
       }else{


            $('#fecha_desdeA').dateTimePicker({
              dateFormat: "DD-MM-YYYY",
              locale: 'es',
              showTime: false,
              selectData: "now",
              positionShift: {top:-190, left: -50},
              title: "Seleccione una Fecha",
              buttonTitle: "Seleccionar"
            });

            $('.fecha_hasta').dateTimePicker({
                 dateFormat: "DD-MM-YYYY",
                 locale: 'es',
                 showTime: false,
                 selectData: moment().add(2, 'days'),
                 min: moment().add(2, 'days'),
                 positionShift: { top: -190, left: -50},
                 title: "Seleccione una fecha",
                 buttonTitle: "Seleccionar"
               });

               $('#fecha_llaveA').dateTimePicker({
                    dateFormat: "DD-MM-YYYY",
                    locale: 'es',
                    showTime: false,
                    selectData: "now",
                    positionShift: { top: -190, left: -50},
                    title: "Seleccione una fecha",
                    buttonTitle: "Seleccionar"
                  });

       }


          $('#TableReservas').DataTable({
             "bDeferRender": true,
             "sPaginationType": "full_numbers",
              "oLanguage": {
             "sProcessing":     "Procesando...",
             "sLengthMenu": 'Mostrar <select>'+
             '<option value="10">10</option>'+
             '<option value="20">20</option>'+
             '<option value="30">30</option>'+
             '<option value="40">40</option>'+
             '<option value="50">50</option>'+
             '<option value="-1">All</option>'+
             '</select> Reservas',
             "sZeroRecords":    "No se encontraron resultados",
             "sEmptyTable":     "Aun No Tienes Reservas!",
              "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ Reservas",
             "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 Reservas",
             "sInfoFiltered":   "(filtrado de un total de _MAX_ Reservas)",
             "sInfoPostFix":    "",
             "sSearch":         "Filtrar:",
             "sUrl":            "",
             "sInfoThousands":  ",",
             "sLoadingRecords": "Por favor espere - cargando...",
             "oPaginate": {
             "sFirst":    "Primero",
             "sLast":     "Último",
             "sNext":     "Siguiente",
             "sPrevious": "Anterior"
              },
              "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
              },
              "dom": 'Bfrtip',
                "buttons": [
                    {
                     extend: 'excelHtml5',
                     title: 'Reservas'
                 },
                 {
                     extend: 'pdfHtml5',
                     orientation: 'landscape',
                     title: 'Reservas',
                 }
             ],
             'responsive': true
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
         swal('Error!','Debe Seleccionar una opción valida','error');
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
    function setStatus(id){
       $('#idstatus').val(id);
       $('#setStatus').modal('show');
    }
    function GuardarStatus(){
      var status=$('#status').val();
      var id=$('#idstatus').val();
      $.ajaxSetup({
                 headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                 });
                 var data="id="+id+"&estado="+status;
          $.ajax({
            url:'setStatus',
            data:data,
            type:'POST',
            success: function(response){
              swal('Exito','Cambios Guardados','success');
              document.location.href="Reservas";
            }
          });
    }
</script>
<div class="container">
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
             outline: none;
             box-shadow:none !important;
             border-bottom:1px solid #ccc !important;
             background: transparent;
           }
           .sel option {
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
           <p >
              <a style="top:-100px;position:relative;color:white;">Mi alojamiento de
                 <select class="sel" onchange="calcularReserva();" id="cantidad_habitaciones" name="" style="color:white;border: none;outline: none;width:175px;height: 40px;display:inline;">
                    <option value="1">1 Cama</option>
                    <option value="2">2 camas</option>
                    <option value="3">3 camas</option>
                    <option value="4">4 camas</option>
                    <option value="5">+5 camas</option>
                 </select>
                      Y
                 <select id="cantidad_banos" class="sel" onchange="calcularReserva();" name="" style="color:white;border: none;outline: none;width:175px;height: 40px;display:inline;">
                    <option value="1">1 Baño</option>
                    <option value="2">2 Baños</option>
                    <option value="3">3 Baños</option>
                    <option value="4">4 Baños</option>
                    <option value="5">+5 Baños</option>
                 </select>
                 , ubicado en
                 <input id="direccion_alojamiento" onchange="calcularReserva();" style="color:white;border: none;outline: none;width:350px;height: 40px;display:inline;" type="text" class="in-sti">
                 ,esta reservado del
                 <div class="in-sti" id="fecha_desdeA" style="top:-100px;position:relative;color:white;border:none;outline: none;width:50px;height:40px;display:inline;"></div>
                 <input type="hidden" id="fecha_desde" class="datepicker in-sti datepic" onchange="calcularReserva();" style="color:white;border:none;outline:none;width: 300px;height: 40px;display:inline;" type="text" >
                hasta el
                <div class="fecha_hasta in-sti " style="color:white;border: none;outline: none;width:50px;height: 40px;display:inline;"></div>
                <input type="hidden"  id="fecha_hasta" class="datepicker in-sti datepic" onchange="calcularReserva();"  style="color:white;border: none;outline: none;width:300px;height: 40px;display:inline;" type="text"/>
                por
                <input id="reservante" onchange="calcularReserva();" style="color:white;border: none;outline: none;width:200px;height: 40px;display:inline;" type="text" class="in-sti" >
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
               <a class="in-sti" style="top:-100px;position:relative;color:lightblue;border: none;outline: none;width:250px;height: 40px;display:inline;" href="terminos_y_condiciones" target="_blank">  Ha leido los Terminos y condiciones?</a>
                 <select class="sel" id="terminos" name="" style="font-size: 30px;top:-100px;position:relative;color:white;border: none;outline: none;width:250px;height: 40px;display:inline;">
                   <option value="0">Seleccionar</option>
                   <option value="1">Si Lei y Acepto los Terminos y Condiones.</option>
                 </select><br>
               <input id="costo_total" style="color:white;border: none;outline: none;width:200px;height: 40px;display:inline;" type="text" class="in-sti" disabled>
                 <button type="button" style="font-size: 25px;" id="GuardarReserva" class="button special" name="button">Reservar Ya</button>
              </a>
           </p>
       </div>
    </div>
  </div>
<br><br>
<h1 style="text-align:center;">Administra Tus Reservas</h1>
<br>
<div class="row">
      <div class="6u">
          <button type="button" class="button special" id="crearReserva" name="button">Crear Reserva</button>
      </div>
</div>

@if(auth()->user()->administrador==1)
<div class="row">
    <div class="6u">
      <button type="button" class="btn btn-success" id="Dolar"></button>
    </div>
</div>
@endif


<br>

<div class="row">
   <div class="12u">

       <table id="TableReservas" class="table table-striped">
         @if(auth()->user()->administrador!=1)
         <thead>
           <tr>
             <th>No</th>
             <th>Inicio</th>
             <th>Fin</th>
             <th>Estado</th>
             <th>Accion</th>
           </tr>
         </thead>
         <tbody>
@foreach($reservas as $reserva)
      <tr>
        <?php
         $value=$reserva->no_reserva;
        ?>
        <td><?php echo str_pad($value, 6, '0', STR_PAD_LEFT); ?></td>
        <?php $fecha1=$reserva->fecha_desde;?>
        <td><?php echo date("d/m/Y", strtotime($fecha1));?></td>
        <?php $fecha2=$reserva->fecha_hasta;?>
        <td><?php echo date("d/m/Y", strtotime($fecha2));?></td>
        <td>{{$reserva->estado}}</td>
        <td><a href="javascript:verReserva({{$reserva->id}});"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a>
                  <a href="{{$reserva->mp_link}}"><button class="btn btn-success"><i class="fas fa-money-check-alt"></i></button></a>
        </td>
      </tr>
@endforeach
</tbody>
<tfoot>
  <tr>
    <th>No</th>
    <th>Inicio</th>
    <th>Fin</th>
    <th>Estado</th>
    <th>Accion</th>
  </tr>
</tfoot>
@else
<thead>
  <tr>
    <th>No</th>
    <th>Inicio</th>
    <th>Fin</th>
    <th>Cliente</th>
    <th>Direccion</th>
    <th>Telefono</th>
    <th>Costo</th>
    <th>Dias</th>
    <th>Status</th>
    <th>Correo</th>
    <th>Accion</th>
  </tr>
</thead>
<tbody>
@foreach($reservas as $reserva)
<tr>
<td>{{$reserva->no_reserva}}</td>
<?php $fecha3=$reserva->fecha_desde;?>
<td><?php echo date("d/m/Y", strtotime($fecha3));?></td>
  <?php $fecha4=$reserva->fecha_hasta;?>
<td><?php echo date("d/m/Y", strtotime($fecha4)); ?></td>
<td>{{$reserva->user->name}}</td>
<td>{{$reserva->direccion_alojamiento}}</td>
<td>{{$reserva->user->telefono_movil}}</td>
<td>{{$reserva->costo_total}}</td>
<td>{{$reserva->numero_dias}}</td>
<td>{{$reserva->estado}}</td>
<td>{{$reserva->user->email}}</td>
<td><a href="javascript:verReserva({{$reserva->id}});"><button class="btn btn-info"><i class="fa fa-eye"></i></button></a>
         <a href="{{$reserva->mp_link}}"><button class="btn btn-success"><i class="fas fa-money-check-alt"></i></button></a>
         <a href="javascript:setStatus({{$reserva->id}});"><button class="btn btn-info"><i class="fas fa-check"></i></button></a>
</td>
</tr>
@endforeach
</tbody>
<tfoot>
<tr>
  <th>No</th>
  <th>Inicio</th>
  <th>Fin</th>
  <th>Cliente</th>
  <th>Direccion</th>
  <th>Telefono</th>
  <th>Costo</th>
  <th>Dias</th>
  <th>Status</th>
  <th>Correo</th>
  <th>Accion</th>
</tr>
</tfoot>
@endif
</table>

<!--Fin tabla-->
</div>
</div>
</div>



<!--moddal-->
<div id="modalReserva" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <input type="hidden" id="control_id" name="" value="">
         <h5 class="modal-title" id="exampleModalLabel">Datos de Reserva</h5>
      </div>
      <div class="modal-body" style="height:300px; overflow-y:scroll;">
        <div class="row">
              <div class="col-sm-12 col-xl-6">
                 <label for="">Cantidad de Habitaciones:</label>
                 <input type="number" class="form-control" id="cantidad_habitaciones1" name="" value="" placeholder="Cantidad de Habitaciones.">
              </div>
              <div class="col-sm-12 col-xl-6">
                <label for="">Cantidad de Baños:</label>
                <input type="number" name="" value="" class="form-control" id="cantidad_banos1" placeholder="Cantidad de Baños.">
              </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <label for="">Ubicación del inmueble:</label>
              <input id="direccion_alojamiento1" type="text" class="form-control" name=""  value="" placeholder="Ubicación">
            </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-xl-6">
                <label for="">Inicio de la Reserva: </label>
                <?php
                $today=date('Y-m-d');
                $femin = strtotime($today.'+ 2 days');
                $feminimo=date("Y-m-d",$femin);
                //$date1 = new DateTime('now');
                //$date2 = new DateTime($fevenci); ?>
                <input type="date" name="" min="<?php echo $feminimo; ?>" value="" id="fecha_desde1" class="form-control">
          </div>
          <div class="col-sm-12 col-xl-6">
               <label for="">Fin de la Reserva: </label>
               <input type="date" name="" value="" class="form-control" id="fecha_hasta1">
          </div>
        </div>
        <div class="row">
           <div class="col-sm-12 col-xl-6">
               <label for="">Reservante:</label>
               <input type="text" name="" value="" class="form-control" name="" id="reservante1" placeholder="Nombre del reservante">
           </div>
           <div class="col-sm-12 col-xl-6">
                <label for="">¿Tenemos tu Llave?</label>
                <select class="" name="" class="form-control" id="llave1" name="">
                   <option value="Si">Si</option>
                   <option value="No">No</option>
                </select>
           </div>
        </div>
        <div class="row">
          <div class="col-12">
               <label for="">Busquen la Llave en:</label>
               <input type="text" name="" value="" class="form-control" id="direccion_llave1" name="" placeholder="Donde quieres que busquemos tu llave.">
          </div>
        </div>
        <div class="row">
             <div class="col-sm-12 col-xl-6">
                <label for="">Horario:</label>
                <select class="" name="" class="form-control" name="" id="hora_llave1">
                    <option value="16:00 y 18:00">16:00 y 18:00</option>
                    <option value="17:00 y 19:00">17:00 y 19:00</option>
                    <option value="18:00 y 20:00">18:00 y 20:00</option>
                 </select>
              </div>
              <div class="col-sm-12 col-xl-6">
                 <label for="">El día:</label>
                 <input type="date" id="fecha_llave1" min="<?php echo date('Y-m-d'); ?>" class="form-control" name="" value="">
              </div>
        </div>


        <div class="row">
            <div class="col-12">
                 <label for="">Valor de la Reserva:</label>
                 <input type="text" name="" value="" id="costo_total1" >
            </div>
        </div>

      </div>
      <div class="modal-footer">
        @if(auth()->user()->administrador==1)
            <button type="button" class="btn btn-primary" id="GuardarCambios">Guardar Cambios</button>
        @endif
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="modalDolar" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <input type="hidden" id="control_id" name="" value="">
         <h5 class="modal-title" id="exampleModalLabel">Datos de Reserva</h5>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-sm-12 col-xl-12">
              <label for="">Dolar Activo</label>
              <select class="form-control" id="optionDolar" name="">
                <option value="0">Seleccionar.</option>
                <option value="dolarof">Dolar Oficial.</option>
                <option value="dolarper">Dolar personalizado.</option>
              </select>
           </div>
           <div class="col-sm-12 col-xl-12">
             <label for="">Valor</label>
             <input type="number" class="form-control" id="valorDolar" value="">
           </div>
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="GuardarDolar">Guardar Cambios</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="setStatus" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <input type="hidden" id="control_id" name="" value="">
         <h5 class="modal-title" id="exampleModalLabel">Datos de Reserva</h5>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-sm-12 col-xl-12">
             <input type="hidden" id="idstatus" value="">
              <label for="">Estado</label>
              <select class="form-control" id="status" name="">
                <option value="Solicitud de Reserva">Solicitud de Reserva</option>
                <option value="Pago Confirmado">Pago Confirmado</option>
                <option value="Llave Recibida">Llave Recibida</option>
                <option value="Trade Mark">Trade Mark</option>
                <option value="Check In">Check In</option>
                <option value="Incidencia">Incidencia</option>
                <option value="Check Out">Check Out</option>
                <option value="Limpieza">Limpieza</option>
                <option value="Listo">Listo</option>
              </select>
           </div>
        </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="GuardarStatus();">Guardar Cambios</button>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
