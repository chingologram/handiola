<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ReservasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Reservas', ['paginacalcular'], ['class' => 'btn btn-success']) ?>

        <?php //Html::button('Create Reservas', ['id' => 'modelButton', 'value' => \yii\helpers\Url::to(['reservas/create']), 'class' => 'btn btn-success']) ?>
    </p>

    <?php 
    /*
        Modal::begin([
                'header' => '',
                'id'     => 'model',
                'size'   => 'model-lg',
        ]);
        
        echo "<div id='modelContent'></div>";
        
        Modal::end();
    */      
    ?>  

    <?php
        Modal::begin([
                'header'=>'<h4>Gererando Botón de Pago...</h4>',
                'id'=>'pagar-modal',
                'size'=>'modal-lg'
        ]);

        echo "<div id='pagarModalContent'></div>";

        Modal::end();
    ?> 

    <?php
        Modal::begin([
                'header'=>'<h1>Estatus del Servicio</h1>',
                'id'=>'view-modal',
                'size'=>'modal-lg'
        ]);

        echo "<div id='viewModalContent'></div>";

        Modal::end();
    ?>  

<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_reserva',
            'dni',
            'cantidad_habitaciones',
            'cantidad_banos',
            'fecha_reserva',
            //'fecha_desde',
            //'fecha_hasta',
            //'numero_dias',
            'costo_total',
            'estatus',            

            //['class' => 'yii\grid\ActionColumn'],


            /*
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {link} {pagar} {leadDelete}',
            'buttons' => [
                
                'update' => function ($url,$model) {
                    return Html::a(
                        '<span class="glyphicon glyphicon-user"></span>', 
                        $url);
                },
                'link' => function ($url,$model,$key) {
                    return Html::a('Action', $url);
                },
                
                'pagar' => function ($url,$model) {
                    return Html::a(
                        '<span class="text-success glyphicon glyphicon-ok" id="modelButton" title="Enviar Pago"></span>', 
                        $url);
                },  

                'leadDelete' => function ($url, $model) {
                    $url = Url::to(['reservas/pagar', 'id' => $model->id_reserva]);
                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                        'title'        => 'create',
                        //'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                        'data-method'  => 'post',
                    ]);
                }, 

            ],],
            */

            [
                'class' => 'yii\grid\ActionColumn',
                'options'=>['class'=>'action-column'],
                'template'=>'{view} {pagar}',
                'buttons'=>[
/*
                            'view' => function ($url,$model) {
                                return Html::a(
                                    '<span class="glyphicon glyphicon-search" title="Ver"></span>', 
                                    $url);
                            }, 
*/
                            'view' => function($url,$model,$key){
                                $btn1 = Html::button("<span class='text-primary glyphicon glyphicon-search'></span>",[
                                    'value'=>Yii::$app->urlManager->createUrl('reservas/viewreserva?id='.$model->id_reserva), //<---- here is where you define the action that handles the ajax request
                                    'class'=>'view-modal-click grid-action',
                                    'data-toggle'=>'tooltip',
                                    'data-placement'=>'bottom',
                                    'title'=>'Ver'
                                ]);
                            return $btn1;                              
                            },
                            'pagar' => function($url,$model,$key){
                                $btn1 = Html::button("<span class='text-success glyphicon glyphicon-ok'></span>",[
                                    'value'=>Yii::$app->urlManager->createUrl('reservas/pagar?id='.$model->id_reserva), //<---- here is where you define the action that handles the ajax request
                                    'class'=>'pagar-modal-click grid-action',
                                    'data-toggle'=>'tooltip',
                                    'data-placement'=>'bottom',
                                    'title'=>'Pagar'
                                ]);
                            return $btn1;
                            }
                ]
            ],            



        ],
    ]); ?>
</div>    
</div>
