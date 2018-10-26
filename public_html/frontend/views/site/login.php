<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\Url;

$this->title = 'Iniciar sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor complete los siguientes campos para iniciar sesión:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->label('Usuario')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->label('Contraseña')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->label('Recuérdame')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Si olvidó su contraseña, puede <?= Html::a('restablecerla', ['site/request-password-reset'], ['class'=>'btn btn-default']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?> ó
                    <?= Html::a('Registrate', ['/site/signup'], ['class'=>'btn btn-success']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
