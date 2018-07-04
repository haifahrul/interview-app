<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KeputusanTipe;

/**
 * KeputusanTipeSearch represents the model behind the search form about `app\models\KeputusanTipe`.
 */
class KeputusanTipeSearch extends KeputusanTipe
{

    public $page;
    public function rules()
    {
        return [
            [['id', 'is_active'], 'integer'],
            [['nama'], 'safe'],
            [['range_nilai_1', 'range_nilai_2'], 'number'],
            ['page', 'safe']
        ];
    }


    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = KeputusanTipe::find()->asArray();
        $query->orderBy(['range_nilai_1'=> SORT_ASC]);
        //$query = KeputusanTipe::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }
        //$query->joinWith('idCostumer');
  

        $query->andFilterWhere([
            'id' => $this->id,
            'range_nilai_1' => $this->range_nilai_1,
            'range_nilai_2' => $this->range_nilai_2,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);

        return $dataProvider;
    }
}
