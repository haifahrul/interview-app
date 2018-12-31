<?php
namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserInterviewer;

/**
 * UserInterviewerSearch represents the model behind the search form about `app\models\UserInterviewer`.
 */
class UserInterviewerSearch extends UserInterviewer
{

    public $page;
    public $email;

    public function rules()
    {
        return [
            [['id', 'user_id', 'is_active'], 'integer'],
            [['nama_pewawancara', 'jabatan_id', 'fakultas_unit_id', 'email'], 'safe'],
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
        $query = UserInterviewer::find()->asArray();
        $query->joinWith(['jabatan', 'fakultasUnit', 'user']);
        $query->orderBy('user_interviewer.id DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        if (isset($this->page)) {
            $dataProvider->pagination->pageSize = $this->page;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'nama_pewawancara', $this->nama_pewawancara])
            ->andFilterWhere(['like', 'user.email', $this->email])
            ->andFilterWhere(['like', 'jabatan.nama', $this->jabatan_id])
            ->andFilterWhere(['like', 'fakultas_unit.nama', $this->fakultas_unit_id]);

        return $dataProvider;
    }
}
