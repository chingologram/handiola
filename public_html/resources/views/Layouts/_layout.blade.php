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

                <link rel="apple-touch-icon" sizes="57x57" href="../../../public/images/apple-icon-57x57.png">
                <link rel="apple-touch-icon" sizes="60x60" href="../../../public/images/apple-icon-60x60.png">
                <link rel="apple-touch-icon" sizes="72x72" href="../../../public/images/apple-icon-72x72.png">
                <link rel="apple-touch-icon" sizes="76x76" href="../../../public/images/apple-icon-76x76.png">
                <link rel="apple-touch-icon" sizes="114x114" href="../../../public/images/apple-icon-114x114.png">
                <link rel="apple-touch-icon" sizes="120x120" href="../../../public/images/apple-icon-120x120.png">
                <link rel="apple-touch-icon" sizes="144x144" href="../../../public/images/apple-icon-144x144.png">
                <link rel="apple-touch-icon" sizes="152x152" href="../../../public/images/apple-icon-152x152.png">
                <link rel="apple-touch-icon" sizes="180x180" href="../../../public/images/apple-icon-180x180.png">
                <link rel="icon" type="image/png" sizes="192x192"  href="../../../public/images/android-icon-192x192.png">
                <link rel="icon" type="image/png" sizes="32x32" href="../../../public/images/favicon-32x32.png">
                <link rel="icon" type="image/png" sizes="96x96" href="../../../public/images/favicon-96x96.png">
                <link rel="icon" type="image/png" sizes="16x16" href="../../../public/images/favicon-16x16.png">
                <link rel="manifest" href="../../../public/images/manifest.json">
                <meta name="msapplication-TileColor" content="#ffffff">
                <meta name="msapplication-TileImage" content="../../../public/images/ms-icon-144x144.png">
                <meta name="theme-color" content="#ffffff">

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
        <nav id="nav" class="main-nav">
          <ul>
            @if (Auth::check())
            <li class="nav-item">
              <a href="logout" class="button "style="background-color:rgba(156,156,156,0.8);">Cerrar Sesión {{auth()->user()->name}}</a>
            </li>
            @else
            <li class="nav-item">
              <a href="login" class="button " style="background-color:rgba(156,156,156,0.8);">Iniciar Sesión | Registrarse</a>
            </li>
           @endif
          </ul>
          
        </nav>
        <nav class="sub-nav clearfix">
              <ul>
                  <li><a href="/">Inicio</a></li>
                  <li><a href="/mision">Misión</a></li>
                  <li><a href="/vision">Visión</a></li>
                  <li><a href="/contacto">Contacto</a></li>
                  @if (Auth::check())
                      <li><a href="/reservas">Mis Reservas</a></li>
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
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-142799134-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'UA-142799134-1');
        </script>
  </body>
  </html>
