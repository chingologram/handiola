<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Reservas;
use frontend\models\ReservasSearch;
use common\models\LoginForm;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ReservasController implements the CRUD actions for Reservas model.
 */
class ReservasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Reservas models.
     * @return mixed
     */
/*    
    public function actionIndex()
    {
        $searchModel = new ReservasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
*/

    public function actionServicios()
    {
        $searchModel = new ReservasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex()
    {

        $modeluser = new User();
        $modeluser = User::findOne(Yii::$app->user->id);

        $model = new Reservas();
        $searchModel = new ReservasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if (isset($modeluser)){
            $username =  $modeluser->username; 

            if ($username =="administrador"){
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
        }

        return $this->render('calcular', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPaginacalcular()
    {
        $model = new Reservas();
        $searchModel = new ReservasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('calcular', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/*BASIC
        public function actionIndex()
    {
        $model = new Reservas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_reserva]);
        }

        return $this->render('calcular', [
            'model' => $model,
        ]);
    } 
*/


    public function actionCalcular()
    {

    //ReservasController::actionCalcular()

    //require __DIR__  .'/'.'../index.php';


    //require __DIR__  .'/'.'../vendor/mercadopago/dxphp/src/MercadoPago/SDK.php';
    //require __DIR__  .'/../vendor/autoload.php';
    //require_once Yii::$app->basePath.'/vendor/autoload.php';


/*
    require_once '../vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("TEST-6826639623857597-052419-a94c61726060ad11a6dbbf8266430046-321582894");

    $payment = new MercadoPago\Payment();

    $payment->transaction_amount = 141;
    $payment->token = "YOUR_CARD_TOKEN";
    $payment->description = "Ergonomic Silk Shirt";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
      "email" => "larue.nienow@hotmail.com"
    );

    $payment->save();

    echo $payment->status;
*/



    $model = new Reservas();

    $request = Yii::$app->request;

    // devuelve todos los parámetros
    $params = $request->bodyParams;

    //$dni = $params['Reservas']['dni']; 
    $cantidad_habitaciones = $params['Reservas']['cantidad_habitaciones'];
    $cantidad_banos = $params['Reservas']['cantidad_banos'];

    $fecha_desde = $params['Reservas']['fecha_desde'];
    $fecha_hasta = $params['Reservas']['fecha_hasta'];


    $datetime1  = date_create($fecha_desde);
    $datetime1  = date_create(date_format($datetime1 , 'Y-m-d'));
    $datetime2  = date_create($fecha_hasta);
    $datetime2  = date_create(date_format($datetime2  , 'Y-m-d'));    
    $interval   = date_diff($datetime1, $datetime2);
    $numero_dias = $interval->format('%a');
    $numero_dias = $numero_dias * 1;


    if ($numero_dias < 0){

            Yii::$app->session->setFlash('error', "La Fecha Hasta no puede ser menor a la Fecha Desde");
            return $this->redirect(['index']);
    }    
    elseif ($numero_dias <= 5){

        $base_servicio=15;
        $costo_habitacion=2.5;
        $costo_bano=2.5;
        $costo_total= $base_servicio+($numero_dias*($cantidad_habitaciones*$costo_habitacion))+($numero_dias*($cantidad_banos*$costo_bano));
        $variable="menos de 5 dias, se quedara: ".$numero_dias ." dias "." por un precio total de: ".$costo_total." $";
    }
    elseif ($numero_dias <= 10){

        $base_servicio=20;
        $costo_habitacion=4;
        $costo_bano=4;
        $costo_total= $base_servicio+($numero_dias*($cantidad_habitaciones*$costo_habitacion))+($numero_dias*($cantidad_banos*$costo_bano));        
        $variable="mas de 5 pero menos de 10 dias, se quedara: ".$numero_dias ." dias "." por un precio total de: ".$costo_total." $";

    }
    elseif($numero_dias > 10){

        $base_servicio=30;
        $costo_habitacion=5;
        $costo_bano=5;
        $costo_total= $base_servicio+($numero_dias*($cantidad_habitaciones*$costo_habitacion))+($numero_dias*($cantidad_banos*$costo_bano));        
        $variable="mas de 10 dias, se quedara: ".$numero_dias ." dias "." por un precio total de: ".$costo_total." $";
    }
 




        $parametros_array=array(
            'model' => $model,
            'base_servicio' => $base_servicio,
            'costo_habitacion' => $costo_habitacion, 
            'costo_bano' => $costo_bano,
            'costo_total' => $costo_total,
            'numero_dias' => $numero_dias, 
            'variable' => $variable,  
            'cantidad_habitaciones' => $cantidad_habitaciones,
            'cantidad_banos' => $cantidad_banos,                                                
            'fecha_desde' => $fecha_desde, 
            'fecha_hasta' => $fecha_hasta,             
        ); 



       //Yii::$app->view->renderFile('@app/views/reservas/servicio_calculado.php',array('variable' => $variable,),false,true);

        return $this->render('@app/views/reservas/servicio_calculado.php', $parametros_array);




/*
        $model = new Reservas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_reserva]);
        }
*/        
        //$variable = " Calculado "." cantidad de habitaciones ".$ch." cantidad de baños ".$cb. "DIAS ".$total_dias;
        
        //return $variable;
    }


    public function actionVerificacion()
    {

    $model = new LoginForm();
    $modeluser = new User();


    if (!Yii::$app->user->isGuest) {

            // devuelve todos los parámetros
            $request = Yii::$app->request;
            $params = $request->bodyParams;

            $modeluser = User::findOne(Yii::$app->user->id);

            $dni =  $modeluser->dni;
            $costo_total = $params['Reservas']['costo_total'];
            $numero_dias = $params['Reservas']['numero_dias'];    
            $cantidad_habitaciones = $params['Reservas']['cantidad_habitaciones'];
            $cantidad_banos = $params['Reservas']['cantidad_banos'];
            $fecha_desde = $params['Reservas']['fecha_desde'];
            $fecha_hasta = $params['Reservas']['fecha_hasta']; 
            $status = "Check in";    

                $data=array(
                    'dni' => $dni,
                    'costo_total' => $costo_total,
                    'numero_dias' => $numero_dias, 
                    'cantidad_habitaciones' => $cantidad_habitaciones,
                    'cantidad_banos' => $cantidad_banos,                                                
                    "fecha_desde" => $fecha_desde, 
                    "fecha_hasta" => $fecha_hasta, 
                    "estatus" => $status,         
                ); 
            ReservasController::actionGuardar($data);
    }
    else{
        
        return $this->redirect(['site/login']);

       //SiteController::actionLogin(); 

        //return $this->render('@app/views/site/login.php', $data);           
    }


    }

    public function actionGuardar($data)
    {
        $model = new Reservas();


        $fechaactual = getdate();
        $fecha_reserva ="$fechaactual[year]"."-"."$fechaactual[mon]"."-"."$fechaactual[mday]";


        $model->dni = $data['dni'];
        $model->cantidad_habitaciones = $data['cantidad_habitaciones'];
        $model->cantidad_banos = $data['cantidad_banos']; 
        $model->fecha_reserva =  $fecha_reserva;  
        $model->fecha_desde =  $data['fecha_desde']; 
        $model->fecha_hasta =  $data['fecha_hasta'];                                      
        $model->numero_dias = $data['numero_dias']; 
        $model->costo_total = $data['costo_total'];
        $model->estatus = $data['estatus'];          
        $model->save();   
            
        if($model->save()) {
            return $this->redirect(['servicios']);
        }
        //ReservasController::actionServicios();       ////VERIFICAR PORQUE NO REDIRECCIONA A VISTA INDEX
        //var_dump ($data['dni']);  exit;
    }


    public function actionPagar($id)
    {

//echo $id;  exit;

    $model = new Reservas();

    $model = Reservas::findOne($id);

    //if ($model){
      $costo_total = $model->costo_total;
    //}
    //else{
      //echo 'No existe el modelo';
    //}


        $data=array(
            //'id' => $id,
            'costo_total' => $costo_total,
           
        );  


    return $this->renderAjax('@frontend/pagar.php',$data);

  
    }


    /**
     * Displays a single Reservas model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewreserva($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }    

    /**
     * Creates a new Reservas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reservas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_reserva]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Reservas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*    
    public function actionUpdatestatus($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_reserva]);
        }

        return $this->render('updatestatus', [
            'model' => $model,
        ]);
    }
*/
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_reserva]);
        }

        $modeluser = new User();
        $modeluser = User::findOne(Yii::$app->user->id);


        if (isset($modeluser)){
            $username =  $modeluser->username; 

            if ($username =="administrador"){
                return $this->render('updatestatus', [
                    'model' => $model,
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }    

    /**
     * Deletes an existing Reservas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Reservas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reservas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reservas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
