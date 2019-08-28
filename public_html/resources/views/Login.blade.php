@extends('Layouts/_layoutlogin')

@section('wraplogin')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
$(document).ready(function(){
        $('#registrarse').click(function(){
          document.location.href="registro";
        });
});
</script>
<div class="">


  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-30 p-b-30">
          <form class="login100-form" action="{{ route('logininit')}}" method="POST">
            {{ csrf_field() }}
					<span class="login100-form-title p-b-20">
            <img src="../../../public/template/images/br.png" alt="">
					</span>
        <div class="text-center w-full p-b-20">
          <span class="txt1">
            Iniciar Sesión Con
          </span>
        </div>
            <a href="redirectgo" class="btn-google">
              <img src="../../../public/template/login/images/icons/icon-google.png" alt="GOOGLE">
              Google
            </a>

            <a href="facebook" class="btn-face">
              <i class="fa fa-facebook-official"></i>
              Facebook
            </a>

          <div class="wrap-input100 validate-input m-t-16 m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
          <input class="input100" type="text" name="email" placeholder="Email">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <span class="lnr lnr-envelope"></span>
          </span>
          {!! $errors->first('email','<span class="help-block">:message</span>') !!}
        </div>

        <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
          <input class="input100" type="password" name="password" placeholder="Contraseña">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <span class="lnr lnr-lock"></span>
          </span>
          {!! $errors->first('password','<span class="help-block">:message</span>') !!}
        </div>

        <div class="contact100-form-checkbox m-l-4">
          <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
          <label class="label-checkbox100" for="ckb1">
            Recordar
          </label>
        </div>

        <div class="container-login100-form-btn p-t-25">
          <button type="submit" class="login100-form-btn">
            Iniciar Sesión
          </button>
          O
          <button type="button" id="registrarse" class="login100-form-btn">
            Registrarse
          </button>
        </div>

        

        
<!--
        <div class="text-center w-full p-t-115">
          <a href="/forgot-password">
              <span class="txt1">
                No recuerdas tu contrase&ntilde;a?
              </span>
          </a>
-->

        </div>
         </form>


			</div>
		</div>
	</div>
</div>

@endsection
<style >
  #skel-layers-hiddenWrapper{
    width: 0%;
    height: 0%;
    display: none;
  }
</style>
