<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "aspek_penilaian".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $aspek_penilaian_tipe_id
 * @property integer $is_active
 *
 * @property AspekPenilaianTipe $aspekPenilaianTipe
 */
class AspekPenilaian extends \yii\db\ActiveRecord
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
        return 'aspek_penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'aspek_penilaian_tipe_id'], 'required'],
            [['aspek_penilaian_tipe_id', 'is_active'], 'integer'],
            [['nama'], 'string'],
            [['aspek_penilaian_tipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => AspekPenilaianTipe::className(), 'targetAttribute' => ['aspek_penilaian_tipe_id' => 'id']],
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
            'aspek_penilaian_tipe_id' => Yii::t('app', 'Tipe Aspek Penilaian'),
            'is_active' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspekPenilaianTipe()
    {
        return $this->hasOne(AspekPenilaianTipe::className(), ['id' => 'aspek_penilaian_tipe_id']);
    }
}
