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
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['dni', 'required'],
            ['dni', 'integer'],

            ['nombre', 'required'],
            ['nombre', 'string', 'max' => 255],

            ['apellido', 'required'],
            ['apellido', 'string', 'max' => 255], 

            ['telefono_habitacion', 'required'],
            ['telefono_habitacion', 'string', 'max' => 255],

            ['telefono_movil', 'required'],
            ['telefono_movil', 'string', 'max' => 255],

            ['domicilio', 'required'],
            ['domicilio', 'string', 'max' => 255],                        

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

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
    }
}
