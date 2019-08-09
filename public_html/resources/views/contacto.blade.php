@extends('Layouts/_layout')

@section('wrapper')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
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
               url:'enviar_formulario',
               data:data,
               type:'POST',
               success: function(response){
                   swal('Formulario Enviado!','Nos pondremos en contacto con tigo a la brevedad.','success');
               }
             });
       });
     });
</script>
<br>
<br>
<h1 style="text-align:center;">Contactanos</h1>

<div class="container">
  <div class="col-xl-8 col-offset-2 col-sm-12">

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
</div>
<br>
@endsection
