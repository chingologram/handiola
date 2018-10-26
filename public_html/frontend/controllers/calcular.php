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


$cantidad_habitaciones= isset($_SESSION['cantidad_habitaciones']) ? $_SESSION['cantidad_habitaciones'] : null;
$cantidad_banos= isset($_SESSION['cantidad_banos']) ? $_SESSION['cantidad_banos'] : null;
$fecha_desde= isset($_SESSION['fecha_desde']) ? $_SESSION['fecha_desde'] : null;
$fecha_hasta= isset($_SESSION['fecha_hasta']) ? $_SESSION['fecha_hasta'] : null;  
          
?>

<div class="reservas-form">

    <h1><?= Html::encode($this->title) ?></h1>    
  
    <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'form-horizontal'],'action' => Url::to(['/reservas/calcular']), ]) ?> 

    <!-- $form->field($model, 'dni')->textInput() ?> 

         $form->field($model, 'cantidad_habitaciones')->textInput() ?>

         $form->field($model, 'cantidad_banos')->textInput() ?> -->

    <div class="form-group row">
        <div class="col-md-offset-3 col-xs-6 col-sm-6 col-md-3">
              <?= $form->field($model, 'cantidad_habitaciones')->label('Cantidad de Habitaciones')->textInput(['value'=>$cantidad_habitaciones]) ?>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-3">
              <?= $form->field($model, 'cantidad_banos')->label('Cantidad de Baños')->textInput(['value'=>$cantidad_banos]) ?>
        </div>
    </div>

    <div class="row">
          <div class="col-md-offset-3 col-xs-6 col-sm-6 col-md-3">
                 <?= $form->field($model, 'fecha_desde')->textInput(['value'=>$fecha_desde])->label('Fecha Desde')->widget(DatePicker::ClassName(),
                    [
                    'name' => 'check_issue_date', 
                    'type' => DatePicker::TYPE_COMPONENT_APPEND, 
                    'readonly' => true,                       
                    //'value' => date('d-M-Y', strtotime('+2 days')),                  
                    'options' => ['value'=>$fecha_desde],
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                        'startDate' => (string) date('d-M-Y', strtotime('+1 days')),
                        //'endDate' => "0d",
                        //'endDate'=> (string) date('d/m/Y'),
                        //'endDate'=> (string) date('d/m/Y',time() + (DAYS * 24 * 60 * 60)),
                        //'daysOfWeekDisabled' => '0,6'   
                        //'hoursDisabled' => '0,1,2,3,4,5,6,7,8,19,20,21,22',
                        'autoclose' => true
                    ]
                ]);?> 
          </div>
          <div class="col-xs-6 col-sm-6 col-md-3">
                 <?= $form->field($model, 'fecha_hasta')->label('Fecha Hasta')->widget(DatePicker::ClassName(),
                    [
                    'name' => 'check_issue_date', 
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'readonly' => true,                      
                    //'value' => date('d-M-Y', strtotime('+2 days')),                 
                    'options' => ['value'=>$fecha_hasta],  
                    'pluginOptions' => [
                        'format' => 'dd-mm-yyyy',
                        'todayHighlight' => true,
                        'startDate' => (string) date('d-M-Y', strtotime('+1 days')),  
                        'autoclose' => true                                              
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
