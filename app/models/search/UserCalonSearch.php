<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserCalon;

/**
 * UserCalonSearch represents the model behind the search form about `app\models\UserCalon`.
 */
class UserCalonSearch extends UserCalon
{

    public $page;
    public function rules()
    {
        return [
            [['id', 'user_id', 'usia', 'keputusan_id', 'status'], 'integer'],
            [['nama_calon', 'pendidikan', 'jabatan_yang_dilamar', 'phone', 'email'], 'safe'],
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
        $query = UserCalon::find()->asArray();
        $query->joinWith('keputusan');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'usia' => $this->usia,
            'keputusan_id' => $this->keputusan_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama_calon', $this->nama_calon])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'jabatan_yang_dilamar', $this->jabatan_yang_dilamar])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }

    public function searchBeranda($params)
    {
        $query = UserCalon::find()->asArray();
        $query->joinWith('keputusan');
        $query->where(['status' => 2]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'usia' => $this->usia,
            'keputusan_id' => $this->keputusan_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'nama_calon', $this->nama_calon])
            ->andFilterWhere(['like', 'pendidikan', $this->pendidikan])
            ->andFilterWhere(['like', 'jabatan_yang_dilamar', $this->jabatan_yang_dilamar])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}