<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

use Yii;



/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $dni;
    public $nombre;
    public $apellido;
    public $telefono_habitacion;
    public $telefono_movil;
    public $domicilio;                    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Nombre de usuario no disponible!.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['dni', 'required'],
            ['dni', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este Dni ya se encuentra registrado!'],
            ['dni', 'integer'],

            ['nombre', 'required'],
            ['nombre', 'string', 'max' => 255],
            ['nombre', 'match', "pattern" => "/^[a-záéíóúñ\s;?\"?]+$/i", "message" => "No se permiten numeros ó caracteres especiales"],

            ['apellido', 'required'],
            ['apellido', 'string', 'max' => 255], 
            ['apellido', 'match', "pattern" => "/^[a-záéíóúñ\s;?\"?]+$/i", "message" => "No se permiten numeros ó caracteres especiales"],            

            ['telefono_habitacion', 'required'],
            ['telefono_habitacion', 'string', 'max' => 255],
            ['telefono_habitacion', 'match', "pattern" => "/^[0-9]+$/", "message" => "No se permiten letras ó caracteres especiales"],             

            ['telefono_movil', 'required'],
            ['telefono_movil', 'string', 'max' => 255],
            ['telefono_movil', 'match', "pattern" => "/^[0-9]+$/", "message" => "No se permiten letras ó caracteres especiales"],             

            ['domicilio', 'required'],
            ['domicilio', 'string', 'max' => 255],
            ['domicilio', 'match', "pattern" => "/^[a-z0-9áéíóúñ\s;?\"?]+$/i", "message" => "No se permiten caracteres especiales"],                            

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email ya se encuentra registrado!.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();

        $request = Yii::$app->request;
        $params = $request->bodyParams;


        //$user = User::findOne($params['SignupForm']['dni']);

        //$dni = $user->dni;

        //if (!isset($dni)){
            $user->username = $this->username;
            $user->email = $this->email;
            $user->dni = $params['SignupForm']['dni']; 
            $user->nombre = $params['SignupForm']['nombre'];  
            $user->apellido = $params['SignupForm']['apellido'];  
            $user->telefono_habitacion = $params['SignupForm']['telefono_habitacion'];  
            $user->telefono_movil = $params['SignupForm']['telefono_movil'];  
            $user->domicilio = $params['SignupForm']['domicilio'];                                                
            $user->setPassword($this->password);
            $user->generateAuthKey();
            
            return $user->save() ? $user : null;
        /*}
        else{
            Yii::$app->session->setFlash('error', "El Dni ya se encuentra registrado, recupere su contraseña");
        }*/    
    }
}
