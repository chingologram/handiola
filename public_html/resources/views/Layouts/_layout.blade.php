<html>
	<head>
		<title>Handiola</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="../../../public/template/js/jquery.min.js"></script>
		<script src="../../../public/template/js/skel.min.js"></script>
		<script src="../../../public/template/js/skel-layers.min.js"></script>
		<script src="../../../public/template/js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="../../../public/template/css/skel.css" />
			<link rel="stylesheet" href="../../../public/template/css/style.css" />
			<link rel="stylesheet" href="../../../public/template/css/style-xlarge.css" />
		</noscript>
		<link rel="stylesheet" href="../../../public/css/please-wait.css">
		<script src="../../../public/js/please-wait.min.js"></script>

	</head>
	<style >
	body > .inner {
		display: none;
	}

	body.pg-loaded > .innerT {
		display: block;
	}
	</style>
	<body id="top" onload="loading();">




				<script type="text/javascript">
        
				</script>
    <header id="header" class="skel-layers-fixed">
        <img src="../../../public/template/images/finalbrand.png" alt="">
        <nav id="nav">
          <ul>
            <li><a class="nav-link" href="/">Inicio</a></li>
            <li></a><a class="nav-link" href="contacto">Contacto</a></li>
            @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="Reservas">Reservas</a>
            </li>
            <li class="nav-item">
              <a href="logout" class="button "style="background-color:rgba(156,156,156,0.8);">Cerrar Sesión {{auth()->user()->name}}</a>
            </li>
            @else
            <li class="nav-item">
              <a href="login" class="button " style="background-color:rgba(156,156,156,0.8);">Iniciar Sesión</a>
            </li>
           @endif
          </ul>
        </nav>
      </header>
      <div>
         @yield('wrapper')
      </div>
      <footer id="footer">
          <div class="container">
            <div class="row double">
              <div class="6u">

              </div>
              <div class="6u">
                <h2 style="text-align:left;">Handiola</h2>
								<p>
									No te olvides de darle un vistazo a nuestras Redes Sociales, así
 estarás enterado de nuestras últimas novedades y promociones
								</p>
                <ul class="icons">

                  <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                  <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>

                </ul>
              </div>
            </div>
            <ul class="copyright">
              <li>&copy; Handiola. Todos los Derechos Reservados.</li>

            </ul>
          </div>
        </footer>
        <style media="screen">
          #skel-layers-hiddenWrapper{
            width: 0%;
            height: 0%;
            display: none;
          }
        </style>
        <!--===============================================================================================-->

  </body>
  </html>
