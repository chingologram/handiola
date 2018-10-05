<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Regístrate';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor llene los siguientes campos para registrarse:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->label('Usuario')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->label('Email') ?>

                <?= $form->field($model, 'dni')->label('Dni') ?>

                <?= $form->field($model, 'nombre')->label('Nombre') ?>

                <?= $form->field($model, 'apellido')->label('Apellido') ?>

                <?= $form->field($model, 'telefono_habitacion')->label('Telefono de Habitación') ?>

                <?= $form->field($model, 'telefono_movil')->label('Telefono Movil') ?> 

                <?= $form->field($model, 'domicilio')->label('Domicilio') ?>                                                                               

                <?= $form->field($model, 'password')->label('Contraseña')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrate', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
