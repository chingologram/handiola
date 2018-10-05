<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--$form->field($model, 'estatus')->textInput()--> 

 

    <?= $form->field($model, 'estatus')->dropDownList(['Check in' => 'Check in', 'Pago Confirmado' => 'Pago Confirmado', 'Recogida de llaves' => 'Recogida de llaves', 'Limpieza' => 'Limpieza', 'Fin del Servicio' => 'Fin del Servicio'], ['options'=>['Check in'=>['Selected'=>true]]])?>    

    <div class="form-group">
        <?= Html::submitButton('Actualizar Estatus', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
