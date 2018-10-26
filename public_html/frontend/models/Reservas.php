<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reservas".
 *
 * @property int $id_reserva
 * @property int $dni
 * @property int $cantidad_habitaciones
 * @property int $cantidad_banos
 * @property string $fecha_reserva
 * @property string $fecha_desde
 * @property string $fecha_hasta
 * @property int $numero_dias
 * @property string $estatus
 * @property double $costo_total
 *
 * @property User $dni0
 */
class Reservas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dni', 'cantidad_habitaciones', 'cantidad_banos', 'fecha_reserva', 'fecha_desde', 'fecha_hasta', 'numero_dias'], 'required'],
            [['dni', 'cantidad_habitaciones', 'cantidad_banos', 'numero_dias'], 'default', 'value' => null],
            [['dni', 'cantidad_habitaciones', 'cantidad_banos', 'numero_dias'], 'integer'],
            [['fecha_reserva', 'fecha_desde', 'fecha_hasta'], 'safe'],
            [['estatus'], 'string'],
            [['costo_total'], 'number'],          
            //[['dni'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['dni' => 'dni']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_reserva' => 'Id Reserva',
            'dni' => 'Dni',
            'cantidad_habitaciones' => 'Cantidad Habitaciones',
            'cantidad_banos' => 'Cantidad Banos',
            'fecha_reserva' => 'Fecha Reserva',
            'fecha_desde' => 'No se aceptan reservas con menos de 48 horas - Fecha Desde',
            'fecha_hasta' => 'No se aceptan reservas con menos de 48 horas - Fecha Hasta',
            'numero_dias' => 'Numero Dias',
            'estatus' => 'Estatus',
            'costo_total' => 'Costo Total',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDni0()
    {
        return $this->hasOne(User::className(), ['dni' => 'dni']);
    }
}
