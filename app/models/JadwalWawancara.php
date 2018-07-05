<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "jadwal_wawancara".
 *
 * @property integer $id
 * @property string $tanggal
 * @property integer $user_calon_id
 * @property integer $user_interviewer_id
 * @property integer $status
 * @property string $timestamp
 *
 * @property UserCalon $userCalon
 * @property UserInterviewer $userInterviewer
 */
class JadwalWawancara extends \yii\db\ActiveRecord
{    
    
    public $nama_calon;
    public $usia;
    
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
        return 'jadwal_wawancara';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'user_calon_id', 'user_interviewer_id'], 'required'],
            [['tanggal', 'timestamp'], 'safe'],
            [['user_calon_id', 'user_interviewer_id', 'status'], 'integer'],
            [['user_calon_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCalon::className(), 'targetAttribute' => ['user_calon_id' => 'id']],
            [['user_interviewer_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserInterviewer::className(), 'targetAttribute' => ['user_interviewer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'user_calon_id' => Yii::t('app', 'Nama Calon'),
            'user_interviewer_id' => Yii::t('app', 'Nama Interviewer'),
            'status' => Yii::t('app', 'Status'),
            'timestamp' => Yii::t('app', 'Timestamp'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCalon()
    {
        return $this->hasOne(UserCalon::className(), ['id' => 'user_calon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserInterviewer()
    {
        return $this->hasOne(UserInterviewer::className(), ['id' => 'user_interviewer_id']);
    }
}
