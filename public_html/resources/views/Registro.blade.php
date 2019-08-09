@extends('Layouts/_layout')

@section('wrapper')
<br>
<br>

<script src="../../../public/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
$(document).ready(function(){
   $('#registrar').click(function(){
       var validacion=validarform();
       if(validacion!='OK'){
           swal('Error!',validacion,'error');
       }else{
         //  email,dni,nombre,apellido,telefono_movil,domicilio,direccion,password,confirmpass,descripcion,recaptchaResponse
         var email=$('#email').val();
        // var dni=$('#dni').val();
         var nombre=$('#nombre').val();
         var apellido=$('#apellido').val();
         var telefono_movil=$('#telefono_movil').val();
         var password=$('#password').val();
         var descripcion=$('#descripcion').val();
         var recaptchaResponse=$('#recaptchaResponse').val();

         var data="email="+email+"&apellido="+apellido+"&nombre="+nombre+"&telefono_movil="+telefono_movil+
         "&password="+password+"&descripcion="+descripcion+"&recaptchaResponse="+recaptchaResponse;
         $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                  });
              $.ajax({
                 method: "post",
                 data: data,
                 url: "<?php echo route('agregar_usuario')?>",
                 success: function(captcha){
                   if(captcha!=1){
                     if(captcha.success==1){
                       swal("Buen Trabajo!", "Te has registrado con exito!", "success")
                       .then((value) => {
                          document.location.href="login";
                             });
                     }else{
                       swal('Error!','Ha ocurrido un error de verificación.','error');
                     }
                   }else{
                     swal("Error!", "El correo Electronico ingresado ya esta registrado!", "error")
                     .then((value) => {
                        document.location.href="login";
                           });
                   }


                }
             });
       }
   });

});
function validarform(){
  var respuesta="";
  //  email,dni,nombre,apellido,telefono_movil,domicilio,direccion,password,confirmpass,descripcion,recaptchaResponse
  if($('#email').val()==''){
    respuesta+="Falta Ingresar Mail \n";}
  //if($('#dni').val()==''){
  //  respuesta+="Falta Ingresar DNI \n";}
  if($('#nombre').val()==''){
      respuesta+="Falta Ingresar Nombre \n";}
  if($('#apellido').val()==''){
      respuesta+="Falta Ingresar Apellido \n";}
  if($('#telefono_movil').val()==''){
      respuesta+="Falta Ingresar Telefono \n";}
  if($('#password').val()==''){
      respuesta+="Falta Ingresar Contraseña \n";
    }else{
        if($('#confirmpass').val()==''){
            respuesta+="confirme Contraseña \n";
          }else{
              if($('#password').val()!=$('#confirmpass').val()){
                  respuesta+="Las contraseñas no coinciden \n";
              }
            }
      }
if(respuesta==''){
  respuesta="OK";
}
  return respuesta;
}
</script>
<div class="container">
    <h1>Registrate en Handola!</h1>

    <p>Por favor complete los siguientes campos para registrarse:</p>
    <div class="row">
        <div class="12u">
            <form class="" action="index.html" method="post">
              <label for="email">Correo Electronico</label>
            <input type="text" name="email" id="email" value="">

       </div>

    </div>
    <div class="row">
        <div class="6u">
          <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="">

       </div>
       <div class="6u">
         <label for="apellido">Apellido</label>
         <input type="text" name="apellido" id="apellido" value="">

      </div>
    </div>
    <div class="row">
        <div class="6u">
          <label for="telefono_movil">Telefono</label>
              <input type="text" name="telefono_movil" id="telefono_movil" value="">

       </div>
       <div class="6u">
         <label for="password">Contraseña</label>
         <input type="password" name="password" id="password" value="">

      </div>
    </div>
    <div class="row">

       <div class="6u">
         <label for="confirmpass">Confirmar Contraseña</label>
         <input type="password" id="confirmpass" class="form-control">

      </div>
      <div class="6u">
        <label for="descripcion">Observaciones</label>
        <input type="text" name="descripcion" id="descripcion" value="">

        <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
     </div>
    </div>
     <br>
     <script src="https://www.google.com/recaptcha/api.js?render=6Lcu5ZoUAAAAAOvF_vSU1DrHE1ztSz1sBWrh3VSP"></script>
  <script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6Lcu5ZoUAAAAAOvF_vSU1DrHE1ztSz1sBWrh3VSP', {action: 'homepage'}).then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
                recaptchaResponse.value = token;
      });
  });
  </script>
  <br>
<div class="form-group">
    <button type="button" class="button special" id="registrar" name="button">Registrarse</button>
</div><br>

</form>
</div>

@endsection
