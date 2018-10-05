<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use common\models\User;

//$this->registerCssFile("@frontend/web/css/style.css");

/* @var $this yii\web\View */
/* @var $model frontend\models\Reservas */

//$this->title = $model->id_reserva;
$this->params['breadcrumbs'][] = ['label' => 'Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="checkout-wrap">
  <ul class="checkout-bar">
        <?php if ($model->estatus=="Check in"){ ?>
            <li class="active">Check in</a></li>    
            <li class="next">Pago Confirmado</li>    
            <li class="next">Recogida de llaves</li>    
            <li class="next">Limpieza</li>    
            <li class="next">Fin del Servicio</li>
        <?php }elseif ($model->estatus=="Pago Confirmado"){ ?>
            <li class="previous visited">Check in</a></li>    
            <li class="active">Pago Confirmado</li>    
            <li class="next">Recogida de llaves</li>    
            <li class="next">Limpieza</li>    
            <li class="next">Fin del Servicio</li> 
        <?php }elseif ($model->estatus=="Recogida de llaves"){ ?> 
            <li class="previous visited">Check in</a></li>    
            <li class="previous visited">Pago Confirmado</li>    
            <li class="active">Recogida de llaves</li>    
            <li class="next">Limpieza</li>    
            <li class="next">Fin del Servicio</li> 
        <?php }elseif ($model->estatus=="Limpieza"){ ?> 
            <li class="previous visited">Check in</a></li>    
            <li class="previous visited">Pago Confirmado</li>    
            <li class="previous visited">Recogida de llaves</li>    
            <li class="active">Limpieza</li>    
            <li class="next">Fin del Servicio</li>
        <?php }elseif ($model->estatus=="Fin del Servicio"){ ?> 
            <li class="previous visited">Check in</a></li>    
            <li class="previous visited">Pago Confirmado</li>    
            <li class="previous visited">Recogida de llaves</li>    
            <li class="previous visited">Limpieza</li>    
            <li class="active">Fin del Servicio</li>
        <?php } ?>                                                                                      
  </ul>
</div>

<br><br><br><br><br><br><br>

<div class="reservas-view">

<h1><?= Html::encode($this->title) ?></h1>

<?php
        $modeluser = new User();
        $modeluser = User::findOne(Yii::$app->user->id);

        if (isset($modeluser)){
            $username =  $modeluser->username; 

            if ($username =="administrador"){ ?>
                <?= Html::a('Actualizar Estatus', ['update', 'id' => $model->id_reserva], ['class' => 'btn btn-primary']) ?> <?php
            }
        }   
?>

<!--
    <p>
         Html::a('Update', ['update', 'id' => $model->id_reserva], ['class' => 'btn btn-primary']) ?>
         Html::a('Delete', ['delete', 'id' => $model->id_reserva], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_reserva',
            'dni',
            'cantidad_habitaciones',
            'cantidad_banos',
            'fecha_reserva',
            'fecha_desde',
            'fecha_hasta',
            'numero_dias',
            'costo_total',
            'estatus',
        ],
    ]) ?>

</div>
