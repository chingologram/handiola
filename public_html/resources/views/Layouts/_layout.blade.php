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

                  <li>
                    <a target="_blank" href="https://www.instagram.com/handiola/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="132.004" height="132" viewBox="0 0 132 132" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>Handiola en Instagram</title>
                            <defs><linearGradient id="b"><stop offset="0" stop-color="#3771c8"/><stop stop-color="#3771c8" offset=".128"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></linearGradient><linearGradient id="a"><stop offset="0" stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></linearGradient><radialGradient id="c" cx="158.429" cy="578.088" r="65" xlink:href="#a" gradientUnits="userSpaceOnUse" gradientTransform="matrix(0 -1.98198 1.8439 0 -1031.402 454.004)" fx="158.429" fy="578.088"/><radialGradient id="d" cx="147.694" cy="473.455" r="65" xlink:href="#b" gradientUnits="userSpaceOnUse" gradientTransform="matrix(.17394 .86872 -3.5818 .71718 1648.348 -458.493)" fx="147.694" fy="473.455"/></defs><path fill="url(#c)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="url(#d)" d="M65.03 0C37.888 0 29.95.028 28.407.156c-5.57.463-9.036 1.34-12.812 3.22-2.91 1.445-5.205 3.12-7.47 5.468C4 13.126 1.5 18.394.595 24.656c-.44 3.04-.568 3.66-.594 19.188-.01 5.176 0 11.988 0 21.125 0 27.12.03 35.05.16 36.59.45 5.42 1.3 8.83 3.1 12.56 3.44 7.14 10.01 12.5 17.75 14.5 2.68.69 5.64 1.07 9.44 1.25 1.61.07 18.02.12 34.44.12 16.42 0 32.84-.02 34.41-.1 4.4-.207 6.955-.55 9.78-1.28 7.79-2.01 14.24-7.29 17.75-14.53 1.765-3.64 2.66-7.18 3.065-12.317.088-1.12.125-18.977.125-36.81 0-17.836-.04-35.66-.128-36.78-.41-5.22-1.305-8.73-3.127-12.44-1.495-3.037-3.155-5.305-5.565-7.624C116.9 4 111.64 1.5 105.372.596 102.335.157 101.73.027 86.19 0H65.03z" transform="translate(1.004 1)"/><path fill="#fff" d="M66.004 18c-13.036 0-14.672.057-19.792.29-5.11.234-8.598 1.043-11.65 2.23-3.157 1.226-5.835 2.866-8.503 5.535-2.67 2.668-4.31 5.346-5.54 8.502-1.19 3.053-2 6.542-2.23 11.65C18.06 51.327 18 52.964 18 66s.058 14.667.29 19.787c.235 5.11 1.044 8.598 2.23 11.65 1.227 3.157 2.867 5.835 5.536 8.503 2.667 2.67 5.345 4.314 8.5 5.54 3.054 1.187 6.543 1.996 11.652 2.23 5.12.233 6.755.29 19.79.29 13.037 0 14.668-.057 19.788-.29 5.11-.234 8.602-1.043 11.656-2.23 3.156-1.226 5.83-2.87 8.497-5.54 2.67-2.668 4.31-5.346 5.54-8.502 1.18-3.053 1.99-6.542 2.23-11.65.23-5.12.29-6.752.29-19.788 0-13.036-.06-14.672-.29-19.792-.24-5.11-1.05-8.598-2.23-11.65-1.23-3.157-2.87-5.835-5.54-8.503-2.67-2.67-5.34-4.31-8.5-5.535-3.06-1.187-6.55-1.996-11.66-2.23-5.12-.233-6.75-.29-19.79-.29zm-4.306 8.65c1.278-.002 2.704 0 4.306 0 12.816 0 14.335.046 19.396.276 4.68.214 7.22.996 8.912 1.653 2.24.87 3.837 1.91 5.516 3.59 1.68 1.68 2.72 3.28 3.592 5.52.657 1.69 1.44 4.23 1.653 8.91.23 5.06.28 6.58.28 19.39s-.05 14.33-.28 19.39c-.214 4.68-.996 7.22-1.653 8.91-.87 2.24-1.912 3.835-3.592 5.514-1.68 1.68-3.275 2.72-5.516 3.59-1.69.66-4.232 1.44-8.912 1.654-5.06.23-6.58.28-19.396.28-12.817 0-14.336-.05-19.396-.28-4.68-.216-7.22-.998-8.913-1.655-2.24-.87-3.84-1.91-5.52-3.59-1.68-1.68-2.72-3.276-3.592-5.517-.657-1.69-1.44-4.23-1.653-8.91-.23-5.06-.276-6.58-.276-19.398s.046-14.33.276-19.39c.214-4.68.996-7.22 1.653-8.912.87-2.24 1.912-3.84 3.592-5.52 1.68-1.68 3.28-2.72 5.52-3.592 1.692-.66 4.233-1.44 8.913-1.655 4.428-.2 6.144-.26 15.09-.27zm29.928 7.97c-3.18 0-5.76 2.577-5.76 5.758 0 3.18 2.58 5.76 5.76 5.76 3.18 0 5.76-2.58 5.76-5.76 0-3.18-2.58-5.76-5.76-5.76zm-25.622 6.73c-13.613 0-24.65 11.037-24.65 24.65 0 13.613 11.037 24.645 24.65 24.645C79.617 90.645 90.65 79.613 90.65 66S79.616 41.35 66.003 41.35zm0 8.65c8.836 0 16 7.163 16 16 0 8.836-7.164 16-16 16-8.837 0-16-7.164-16-16 0-8.837 7.163-16 16-16z"/></svg>
                    </a>
                  </li>
                  <li><a href="https://handiola.home.blog/">
                    <svg
                       xmlns:dc="http://purl.org/dc/elements/1.1/"
                       xmlns:cc="http://creativecommons.org/ns#"
                       xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                       xmlns:svg="http://www.w3.org/2000/svg"
                       xmlns="http://www.w3.org/2000/svg"
                       xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                       xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                       width="50.664463mm"
                       height="50.575432mm"
                       viewBox="0 0 179.51975 179.20429"
                       id="svg2"
                       version="1.1"
                       inkscape:version="0.91 r13725"
                       sodipodi:docname="Blogger.svg">
                      <title
                         id="title4226">Handiola en Blogger</title>
                      <defs
                         id="defs4" />
                      <sodipodi:namedview
                         id="base"
                         pagecolor="#ffffff"
                         bordercolor="#666666"
                         borderopacity="1.0"
                         inkscape:pageopacity="0.0"
                         inkscape:pageshadow="2"
                         inkscape:zoom="1.4"
                         inkscape:cx="103.69453"
                         inkscape:cy="94.716359"
                         inkscape:document-units="px"
                         inkscape:current-layer="g4149"
                         showgrid="false"
                         fit-margin-top="0"
                         fit-margin-left="0"
                         fit-margin-right="0"
                         fit-margin-bottom="0"
                         inkscape:window-width="1366"
                         inkscape:window-height="705"
                         inkscape:window-x="-8"
                         inkscape:window-y="-8"
                         inkscape:window-maximized="1" />
                      <metadata
                         id="metadata7">
                        <rdf:RDF>
                          <cc:Work
                             rdf:about="">
                            <dc:format>image/svg+xml</dc:format>
                            <dc:type
                               rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                            <dc:title>Blogger logo</dc:title>
                            <cc:license
                               rdf:resource="http://creativecommons.org/licenses/by-sa/3.0/" />
                            <dc:date>14/11/2016</dc:date>
                            <dc:creator>
                              <cc:Agent>
                                <dc:title>Google, Inc.</dc:title>
                              </cc:Agent>
                            </dc:creator>
                            <dc:publisher>
                              <cc:Agent>
                                <dc:title>CMetalCore</dc:title>
                              </cc:Agent>
                            </dc:publisher>
                          </cc:Work>
                          <cc:License
                             rdf:about="http://creativecommons.org/licenses/by-sa/3.0/">
                            <cc:permits
                               rdf:resource="http://creativecommons.org/ns#Reproduction" />
                            <cc:permits
                               rdf:resource="http://creativecommons.org/ns#Distribution" />
                            <cc:requires
                               rdf:resource="http://creativecommons.org/ns#Notice" />
                            <cc:requires
                               rdf:resource="http://creativecommons.org/ns#Attribution" />
                            <cc:permits
                               rdf:resource="http://creativecommons.org/ns#DerivativeWorks" />
                            <cc:requires
                               rdf:resource="http://creativecommons.org/ns#ShareAlike" />
                          </cc:License>
                        </rdf:RDF>
                      </metadata>
                      <g
                         inkscape:label="Capa 1"
                         inkscape:groupmode="layer"
                         id="layer1"
                         transform="translate(-157.76392,-165.65276)">
                        <g
                           id="g4149"
                           transform="translate(233.34014,-698.87178)">
                          <path
                             style="fill:#f06a35"
                             d="m -55.063807,1043.0234 c -3.359449,-0.8837 -6.258272,-2.1837 -8.931866,-4.0056 -2.256922,-1.5379 -5.555601,-4.7174 -6.810077,-6.5637 -1.532132,-2.255 -3.293254,-6.1168 -4.010994,-8.795 -0.732062,-2.7319 -0.743927,-3.8198 -0.757063,-69.39501 -0.01306,-65.24411 0.0018,-66.67877 0.719335,-69.48264 2.53752,-9.91559 10.395271,-17.45981 20.529599,-19.71045 2.913842,-0.64711 133.079792,-0.76029 136.222893,-0.11843 8.508999,1.73759 15.197718,6.84619 19.06824,14.56362 3.07712,6.13545 2.80203,-0.61622 2.94296,72.23085 0.0897,46.34991 0.007,65.80856 -0.28883,68.23286 -1.38576,11.3442 -9.210679,20.1431 -20.470153,23.0183 -2.880202,0.7354 -3.882129,0.7459 -69.275121,0.7259 -63.227195,-0.019 -66.474476,-0.052 -68.938923,-0.7007 z"
                             id="path4195" />
                          <path
                             style="fill:#fefefe;fill-opacity:0"
                             d="m -158.57144,952.36221 0,-171.89999 510,0 510,0 0,171.89999 0,171.89999 -510,0 -510,0 0,-171.89999 z"
                             id="path4165"
                             inkscape:connector-curvature="0" />
                          <path
                             style="fill:#ffffff"
                             d="m 39.58546,1009.3592 c 8.064748,-1.1001 14.384531,-4.3325 20.313328,-10.3896 4.288999,-4.38181 6.973811,-9.12472 8.728379,-15.41921 0.728903,-2.6149 0.790018,-3.88807 0.923587,-19.24149 0.100809,-11.58796 0.01669,-17.01514 -0.285075,-18.38528 -0.437344,-1.98593 -1.67711,-3.83016 -3.091687,-4.59911 -0.435299,-0.23661 -3.224334,-0.53819 -6.197859,-0.67015 -4.982681,-0.22115 -5.540155,-0.31832 -7.11287,-1.24 -2.494681,-1.46198 -3.181724,-3.04069 -3.188544,-7.32677 -0.01304,-8.1894 -3.421087,-15.79237 -10.154891,-22.65435 -4.797263,-4.8886 -10.14889,-8.19759 -16.256563,-10.05172 -1.462167,-0.44388 -4.736105,-0.59493 -15.7023605,-0.72452 -17.2069763,-0.20332 -21.0264035,0.14939 -26.8842785,2.48265 -10.799733,4.30168 -18.559563,13.36742 -21.390152,24.98992 -0.531646,2.18295 -0.634845,5.6815 -0.760427,25.77865 -0.157327,25.17748 0.01622,28.87467 1.589422,33.86414 1.299798,4.12233 2.611223,6.64844 5.312916,10.23388 5.146805,6.83036 12.860236,11.76336 20.572006,13.15646 3.669923,0.6631 48.94793,0.829 53.585069,0.1965 z"
                             id="path4163" />
                          <path
                             style="fill:#f06a35"
                             d="m -8.0012107,940.24201 c -4.1229413,-1.13646 -5.6634683,-7.05179 -2.6332273,-10.11109 1.9367555,-1.95536 2.4721802,-2.02981 14.5952492,-2.02981 10.8833578,0 11.2491898,0.0238 12.8478758,0.83129 2.310253,1.16711 3.314106,2.81263 3.314106,5.43252 0,2.36619 -0.942769,4.0244 -3.045645,5.35691 -1.129143,0.71549 -1.803912,0.76002 -12.4672419,0.82265 -6.5844803,0.0387 -11.829856,-0.0872 -12.6111168,-0.30247 z"
                             id="path4168" />
                          <path
                             style="fill:#f06a35"
                             d="m -8.5177926,980.05059 c -1.7697484,-0.77113 -3.4178244,-2.91327 -3.7026534,-4.81263 -0.271319,-1.80929 0.637963,-4.29669 2.031786,-5.55809 1.7569755,-1.59003 2.5280723,-1.64307 24.134743,-1.66008 22.226353,-0.0174 22.11068,-0.0268 24.218307,1.94113 2.976827,2.77944 2.348939,7.7279 -1.238363,9.75964 l -3.686323,0.59948 -19.213121,0.22489 c -16.8830622,0.19762 -21.6656419,-0.1114 -22.5443756,-0.49433 z"
                             id="path4166" />
                        </g>
                      </g>
                    </svg>
                    </a></li>

                <li><a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 39 39">
                        <title>Handiola en Whatsapp</title>
                        <path fill="#00E676" d="M10.7 32.8l.6.3c2.5 1.5 5.3 2.2 8.1 2.2 8.8 0 16-7.2 16-16 0-4.2-1.7-8.3-4.7-11.3s-7-4.7-11.3-4.7c-8.8 0-16 7.2-15.9 16.1 0 3 .9 5.9 2.4 8.4l.4.6-1.6 5.9 6-1.5z"></path><path fill="#FFF" d="M32.4 6.4C29 2.9 24.3 1 19.5 1 9.3 1 1.1 9.3 1.2 19.4c0 3.2.9 6.3 2.4 9.1L1 38l9.7-2.5c2.7 1.5 5.7 2.2 8.7 2.2 10.1 0 18.3-8.3 18.3-18.4 0-4.9-1.9-9.5-5.3-12.9zM19.5 34.6c-2.7 0-5.4-.7-7.7-2.1l-.6-.3-5.8 1.5L6.9 28l-.4-.6c-4.4-7.1-2.3-16.5 4.9-20.9s16.5-2.3 20.9 4.9 2.3 16.5-4.9 20.9c-2.3 1.5-5.1 2.3-7.9 2.3zm8.8-11.1l-1.1-.5s-1.6-.7-2.6-1.2c-.1 0-.2-.1-.3-.1-.3 0-.5.1-.7.2 0 0-.1.1-1.5 1.7-.1.2-.3.3-.5.3h-.1c-.1 0-.3-.1-.4-.2l-.5-.2c-1.1-.5-2.1-1.1-2.9-1.9-.2-.2-.5-.4-.7-.6-.7-.7-1.4-1.5-1.9-2.4l-.1-.2c-.1-.1-.1-.2-.2-.4 0-.2 0-.4.1-.5 0 0 .4-.5.7-.8.2-.2.3-.5.5-.7.2-.3.3-.7.2-1-.1-.5-1.3-3.2-1.6-3.8-.2-.3-.4-.4-.7-.5h-1.1c-.2 0-.4.1-.6.1l-.1.1c-.2.1-.4.3-.6.4-.2.2-.3.4-.5.6-.7.9-1.1 2-1.1 3.1 0 .8.2 1.6.5 2.3l.1.3c.9 1.9 2.1 3.6 3.7 5.1l.4.4c.3.3.6.5.8.8 2.1 1.8 4.5 3.1 7.2 3.8.3.1.7.1 1 .2h1c.5 0 1.1-.2 1.5-.4.3-.2.5-.2.7-.4l.2-.2c.2-.2.4-.3.6-.5s.4-.4.5-.6c.2-.4.3-.9.4-1.4v-.7s-.1-.1-.3-.2z"></path></svg>
                </a></li>

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
