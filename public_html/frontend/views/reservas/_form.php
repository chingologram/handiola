<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dni')->textInput() ?>

    <?= $form->field($model, 'cantidad_habitaciones')->textInput() ?>

    <?= $form->field($model, 'cantidad_banos')->textInput() ?>

    <?= $form->field($model, 'fecha_reserva')->textInput() ?>

    <?= $form->field($model, 'fecha_desde')->textInput() ?>

    <?= $form->field($model, 'fecha_hasta')->textInput() ?>

    <?= $form->field($model, 'numero_dias')->textInput() ?>

    <?= $form->field($model, 'costo_total')->textInput() ?>

    <?= $form->field($model, 'estatus')->textInput() ?>    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
