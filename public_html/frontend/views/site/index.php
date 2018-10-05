<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

$this->title = 'Pagina Web Handi';
?>




<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
-->
<body>






<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido a Handi!</h1>

        <p class="lead">¿Tienes una casa en alquiler en Airbnb, Booking, TripAdvisor...?</p>

        <p><a <?= Html::a('Estoy Listo!', ['/reservas/index'], ['class'=>'btn btn-lg btn-success']) ?> </a></p>
    </div>

    <div class="body-content">


<div class="">  <!-- container -->
    <div class="row">
        <!-- Boxes de Acoes -->
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-home"></i></div>
                    <div class="info">
                        <h3 class="title">Titulo 1</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                        <div class="more">
                            <!--<a href="#" title="Title Link">
                                Leer Mas <i class="fa fa-angle-double-right"></i>
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-cloud"></i></div>
                    <div class="info">
                        <h3 class="title">Titulo 2</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                        <div class="more">
                            <!--<a href="#" title="Title Link">
                                Leer Mas <i class="fa fa-angle-double-right"></i>
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>
            
        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-pushpin"></i></div>
                    <div class="info">
                        <h3 class="title">Titulo 3</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                        <div class="more">
                            <!--<a href="#" title="Title Link">
                                Leer Mas <i class="fa fa-angle-double-right"></i>
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div> 

        <div class="col-xs-12 col-sm-6 col-lg-3">
            <div class="box">                           
                <div class="icon">
                    <div class="image"><i class="glyphicon glyphicon-envelope"></i></div>
                    <div class="info">
                        <h3 class="title">Titulo 4</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in lobortis nisl, vitae iaculis sapien. Phasellus ultrices gravida massa luctus ornare. Suspendisse blandit quam elit, eu imperdiet neque semper.
                        </p>
                        <div class="more">
                            <!--<a href="#" title="Title Link">
                                Leer Mas <i class="fa fa-angle-double-right"></i>
                            </a>-->
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div> 
        </div>                    
        <!-- /Boxes de Acoes -->
    </div>
</div>        

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>--></p>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>--></p>
            </div>
        </div>        



        <div class="parallax">
            <div style="height:500px">  <!--height:1000px;background-color:red;font-size:36px-->
            </div>
        </div>


        <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
        </div>

        <div>
            <section class="w3-row-padding w3-center w3-light-grey">
              <article class="w3-third">
                <p>Daniel</p>
                    <?php echo Html::img('../../images/dan.png') ?> 
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                    
                <p>Daniels Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
              <article class="w3-third">
                <p>Majo</p>
                    <?php echo Html::img('../../images/majo.png') ?> 
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                    
                <p>Majo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
              <article class="w3-third">
                <p>Juan</p>
                    <?php echo Html::img('../../images/juan.png') ?> 
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                    
                <p>Juan Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
            </section>
        </div>





        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>--></p>
            </div>
        </div>


        <div>
            <section class="w3-row-padding w3-center w3-light-grey">
              <article class="w3-third">
                <p>Daniel</p>
                    <img src='../../images/dan.png' class="img-circle person" alt="Random Name" width="255" height="255">
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                       
                <p>Daniels Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
              <article class="w3-third">
                <p>Majo</p>
                    <img src='../../images/majo.png' class="img-circle person" alt="Random Name" width="255" height="255">
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                      
                <p>Majo Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
              <article class="w3-third">
                <p>Juan</p>
                    <img src='../../images/juan.png' class="img-circle person" alt="Random Name" width="255" height="255">
                    <div style="margin: 24px 0;">
                        <a href="#"><i class="fa fa-facebook"></i></a> 
                        <a href="#"><i class="fa fa-twitter"></i></a>  
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                     </div>                      
                <p>Juan Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua.</p>
              </article>
            </section>
        </div>

        
        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a>--></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><!--<a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a>--></p>
            </div>
        </div>   



<div class="container text-center">
  <h3>Titulo</h3>
  <p><em></em></p>
  <p></p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Daniel</strong></p><br>
      <img src='../../images/dan.png' class="img-circle person" alt="Random Name" width="255" height="255">
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>
         </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Majo</strong></p><br>
      <img src='../../images/majo.png' class="img-circle person" alt="Random Name" width="255" height="255">
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>
         </div>      
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Juan</strong></p><br>
      <img src='../../images/juan.png' class="img-circle person" alt="Random Name" width="255" height="255">
        <div style="margin: 24px 0;">
            <a href="#"><i class="fa fa-facebook"></i></a> 
            <a href="#"><i class="fa fa-twitter"></i></a>  
            <a href="#"><i class="fa fa-linkedin"></i></a>
         </div>      
    </div>
  </div>
</div>






    </div>
</div>
</body>
</html>