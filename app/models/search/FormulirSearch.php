<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formulir;

/**
 * FormulirSearch represents the model behind the search form about `app\models\Formulir`.
 */
class FormulirSearch extends Formulir
{

    public $page;
    public function rules()
    {
        return [
            [['id', 'calon_id'], 'integer'],
            [['tanggal_wawancara', 'catatan', 'timestamp', 'interviewer_id', 'keputusan_id'], 'safe'],
            [['nilai'], 'number'],
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
        $query = Formulir::find()->asArray();
        $query->joinWith(['calon', 'interviewer', 'keputusan']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'keputusan_id' => $this->keputusan_id,
            'nilai' => $this->nilai,
            // 'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'user_calon.nama_calon', $this->calon_id])
            ->andFilterWhere(['like', 'user_interviewer.nama_pewawancara', $this->interviewer_id])
            ->andFilterWhere(['like', 'tanggal_wawancara', $this->tanggal_wawancara])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}