<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;

use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Reservas */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Calcula tu Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



            echo " Total dias= ".$numero_dias." --- "; 
            echo "Base del servicio= ".$base_servicio." --- ";
            echo " Costo de la habitación= ".$costo_habitacion." --- "; 
            echo " Costo de la habitación= ".$costo_bano." --- ";
            echo " Precio Total= ".$costo_total." --- ";
            echo $variable;


?>

<div class="reservas-form">

 
     <h1>Su Calculo de servicio es:</h1> 
  
    <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-horizontal'],'action' => Url::to(['/reservas/verificacion']), ]) ?> 

    <?= $form->field($model, 'cantidad_habitaciones')->hiddenInput(['value'=>$cantidad_habitaciones])->label(false); ?>
    <?= $form->field($model, 'cantidad_banos')->hiddenInput(['value'=>$cantidad_banos])->label(false); ?>
    <?= $form->field($model, 'numero_dias')->hiddenInput(['value'=>$numero_dias])->label(false); ?>
    <?= $form->field($model, 'costo_total')->hiddenInput(['value'=>$costo_total])->label(false); ?> 
    <?= $form->field($model, 'fecha_desde')->hiddenInput(['value'=>$fecha_desde])->label(false); ?> 
    <?= $form->field($model, 'fecha_hasta')->hiddenInput(['value'=>$fecha_hasta])->label(false); ?>            


    <div class="form-group row">
        <div class="input-group col-xs-offset-7 col-xs-4 col-sm-3 col-md-3">
              <span class="input-group-addon">$</span>
              <input type="text" class="form-control input-lg" value=<?php echo $costo_total; ?> align="right" disabled>
              <!--<span class="input-group-addon">.00</span>-->
        </div>
    </div><br>



    <div class="form-group">
        <div class="text-center">        
          <?= Html::submitButton('Reservar', ['class' => 'btn btn-success']) ?>
        </div>            
    </div>

    <?php ActiveForm::end(); ?>
 
</div>

