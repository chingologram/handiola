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
?>

<div class="reservas-form">

    <h1><?= Html::encode($this->title) ?></h1>    
  
    <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-horizontal'],'action' => Url::to(['/reservas/calcular']), ]) ?> 

    <!-- $form->field($model, 'dni')->textInput() ?> 

         $form->field($model, 'cantidad_habitaciones')->textInput() ?>

         $form->field($model, 'cantidad_banos')->textInput() ?> -->

    <div class="form-group row">
        <div class="col-md-offset-3 col-xs-6 col-sm-6 col-md-3">
              <?= $form->field($model, 'cantidad_habitaciones')->label('Cantidad de Habitaciones')->textInput() ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
              <?= $form->field($model, 'cantidad_banos')->label('Cantidad de Baños')->textInput() ?>
        </div>
    </div>

    <div class="row">
          <div class="col-md-offset-3 col-xs-6 col-sm-6 col-md-3">
                 <?= $form->field($model, 'fecha_desde')->widget(DatePicker::ClassName(),
                    [
                    'name' => 'check_issue_date', 
                    'type' => DatePicker::TYPE_COMPONENT_APPEND, 
                    'readonly' => true,                       
                   // 'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Fecha Desde ...'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                    ]
                ]);?> 
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
                 <?= $form->field($model, 'fecha_hasta')->widget(DatePicker::ClassName(),
                    [
                    'name' => 'check_issue_date', 
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'readonly' => true,                      
                   // 'value' => date('d-M-Y', strtotime('+2 days')),
                    'options' => ['placeholder' => 'Fecha Hasta ...'],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                    ]
                ]);?> 
          </div>
    </div>

    <!-- $form->field($model, 'numero_dias')->textInput() ?>

         $form->field($model, 'costo_total')->textInput() ?>  -->

    <div class="form-group">
        <div class="text-center">      
          <?= Html::submitButton('Calcular', ['class' => 'btn btn-success']) ?>
        </div>          
    </div>

    <?php ActiveForm::end(); ?>

</div>
