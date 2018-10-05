<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Reservas;
use common\models\User;

/**
 * ReservasSearch represents the model behind the search form of `frontend\models\Reservas`.
 */
class ReservasSearch extends Reservas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_reserva', 'dni', 'cantidad_habitaciones', 'cantidad_banos', 'numero_dias', 'costo_total'], 'integer'],
            [['fecha_reserva', 'fecha_desde', 'fecha_hasta', 'estatus'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $modeluser = User::findOne(Yii::$app->user->id);
        $dni=$this->dni;
        
        if (isset($modeluser)){
            $dni =  $modeluser->dni;
            $username =  $modeluser->username;  


            if ($username =="administrador"){
                $dni=$this->dni;
            }
        }


        $query = Reservas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_reserva' => $this->id_reserva,
            'dni' => $dni,
            'cantidad_habitaciones' => $this->cantidad_habitaciones,
            'cantidad_banos' => $this->cantidad_banos,
            'fecha_reserva' => $this->fecha_reserva,
            'fecha_desde' => $this->fecha_desde,
            'fecha_hasta' => $this->fecha_hasta,
            'numero_dias' => $this->numero_dias,
            'costo_total' => $this->costo_total,
        ]);

        $query->andFilterWhere(['ilike', 'estatus', $this->estatus]);

        return $dataProvider;
    }
}
