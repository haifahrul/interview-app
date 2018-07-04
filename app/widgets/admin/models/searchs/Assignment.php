<?php

namespace app\widgets\admin\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * AssignmentSearch represents the model behind the search form about Assignment.
 * 
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Assignment extends Model {

    public $id;
    public $username;
    public $email;
    public $status;
    public $updated_at;
    public $created_at;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['status', 'updated_at', 'created_at'], 'safe'],
            [['id', 'username', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Create data provider for Assignment model.
     * @param  array                        $params
     * @param  \yii\db\ActiveRecord         $class
     * @param  string                       $usernameField
     * @return \yii\data\ActiveDataProvider
     */
    public function search($params, $class, $usernameField) {
        $query = $class::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->filterWhere([
            'status' => $this->status,
        ]);
        
        $query->andFilterWhere(['like', $usernameField, $this->username]);
        $query->andFilterWhere(['like', 'email', $this->email]);
//        $query->andFilterWhere(['like', 'FROM_UNIXTIME(created_at, "%Y-%m-%d")', date('Y-m-d', strtotime($this->created_at))]);
//        $query->andFilterWhere(['like', 'FROM_UNIXTIME(updated_at, "%Y-%m-%d")', date('Y-m-d', strtotime($this->updated_at))]);

        return $dataProvider;
    }

}
