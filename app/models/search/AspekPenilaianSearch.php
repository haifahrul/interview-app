<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AspekPenilaian;

/**
 * AspekPenilaianSearch represents the model behind the search form about `app\models\AspekPenilaian`.
 */
class AspekPenilaianSearch extends AspekPenilaian
{

    public $page;
    public function rules()
    {
        return [
            [['id', 'aspek_penilaian_tipe_id', 'is_active'], 'integer'],
            [['nama'], 'safe'],
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
        $query = AspekPenilaian::find()->asArray();
        $query->joinWith('aspekPenilaianTipe');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'aspek_penilaian.is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
        ->andFilterWhere(['like', 'aspek_penilaian_tipe.nama', $this->aspek_penilaian_tipe_id]);

        return $dataProvider;
    }
}
