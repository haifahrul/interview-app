<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JadwalWawancara;

/**
 * JadwalWawancaraSearch represents the model behind the search form about `app\models\JadwalWawancara`.
 */
class JadwalWawancaraSearch extends JadwalWawancara
{

    public $page;
    public function rules()
    {
        return [
            [['id', 'user_calon_id', 'user_interviewer_id', 'status'], 'integer'],
            [['tanggal', 'timestamp'], 'safe'],
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
        $query = JadwalWawancara::find()->asArray();
        $query->joinWith(['userCalon', 'userInterviewer']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'user_calon.nama_calon', $this->user_calon_id])
            ->andFilterWhere(['like', 'user_interviewer.nama_pewawancara', $this->user_interviewer_id])
            ->andFilterWhere(['like', 'tanggal', $this->tanggal]);

        return $dataProvider;
    }

    public function searchInterviewer($params)
    {
        $query = JadwalWawancara::find()->asArray();
        $query->joinWith(['userCalon', 'userInterviewer']);
        $query->where(['user_interviewer.user_id' => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if(isset($this->page)){
            $dataProvider->pagination->pageSize=$this->page; 
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'user_calon.nama_calon', $this->user_calon_id])
            ->andFilterWhere(['like', 'user_interviewer.nama_pewawancara', $this->user_interviewer_id])
            ->andFilterWhere(['like', 'tanggal', $this->tanggal]);

        return $dataProvider;
    }
}
