<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $is_active
 *
 * @property UserInterviewer[] $userInterviewers
 */
class Jabatan extends \yii\db\ActiveRecord
{    
    // public function behaviors() {
    //     return [
    //         [
    //             'class' => BlameableBehavior::className(),
    //             'createdByAttribute' => 'created_by',
    //             'updatedByAttribute' => 'updated_by',
    //         ],
    //         'timestamp' => [
    //             'class' => 'yii\behaviors\TimestampBehavior',
    //             'attributes' => [
    //                 ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
    //                 ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
    //             ],
    //         ],
    //     ];
    // }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['is_active'], 'integer'],
            [['nama'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama'),
            'is_active' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserInterviewers()
    {
        return $this->hasMany(UserInterviewer::className(), ['jabatan_id' => 'id']);
    }

    public static function getListData() 
    {
        $query = Yii::$app->db->createCommand('SELECT * FROM jabatan WHERE is_active=1')->queryAll();
        
        return ArrayHelper::map($query, 'id', 'nama');
    }
}
