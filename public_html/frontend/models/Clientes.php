<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id_cliente
 * @property int $dni
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono_habitacion
 * @property string $telefono_movil
 * @property string $domicilio
 * @property string $correo_electronico
 * @property string $ruta_foto
 *
 * @property Reservas[] $reservas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'nombre', 'apellido'], 'required'],
            [['dni'], 'default', 'value' => null],
            [['dni'], 'integer'],
            [['telefono_habitacion', 'telefono_movil', 'ruta_foto'], 'string'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['domicilio'], 'string', 'max' => 150],
            [['correo_electronico'], 'string', 'max' => 40],
            [['dni'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'dni' => 'Dni',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono_habitacion' => 'Telefono Habitacion',
            'telefono_movil' => 'Telefono Movil',
            'domicilio' => 'Domicilio',
            'correo_electronico' => 'Correo Electronico',
            'ruta_foto' => 'Ruta Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reservas::className(), ['dni' => 'dni']);
    }
}
