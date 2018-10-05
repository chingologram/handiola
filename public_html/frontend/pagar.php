<div class="progress">
  <div id="27" class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    100%
  </div>
</div>

<?php

require_once ('mercadopago.php');

$mp = new MP ("6826639623857597", "CCDPyxBAXq53MrzRtAsMtKf4yN2CpUIO");


$preference_data = array (
    "items" => array (
        array (
            "title" => "Handi: Servicio de Limpieza",
            "quantity" => 1,
            "currency_id" => "USD",
            "unit_price" => $costo_total
        )
    )
);

$preference = $mp->create_preference($preference_data);

$url=$preference['response']['init_point'];

//print_r ($url);

 
?>
<!--
<body>
<script type="text/javascript">
window.location="<?php //echo $url; ?>";
</script>
</body>
--> 


<!--HTML--> 
<div class="text-center">
    <button type="submit" class="btn btn-primary" onclick="openExt('<?php echo $url; ?>')">Procesar en Mercado Pago</button>
</div>

<!--JavaScript--> 
<script type="text/javascript"> 
function openExt(url) {
    window.open(url, "_blank"); 
    $('#pagar-modal').modal('hide');
    //window.close();

    location.reload();
} 
</script>

