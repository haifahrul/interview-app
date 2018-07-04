<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "formulir_kriteria_penilaian".
 *
 * @property integer $id
 * @property integer $formulir_id
 * @property integer $aspek_penilaian_id
 * @property integer $kriteria_penilaian
 *
 * @property AspekPenilaian $aspekPenilaian
 * @property Formulir $formulir
 */
class FormulirKriteriaPenilaian extends \yii\db\ActiveRecord
{    
    public function behaviors() {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formulir_kriteria_penilaian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['formulir_id', 'aspek_penilaian_id', 'kriteria_penilaian'], 'required'],
            [['formulir_id', 'aspek_penilaian_id', 'kriteria_penilaian'], 'integer'],
            [['aspek_penilaian_id'], 'exist', 'skipOnError' => true, 'targetClass' => AspekPenilaian::className(), 'targetAttribute' => ['aspek_penilaian_id' => 'id']],
            [['formulir_id'], 'exist', 'skipOnError' => true, 'targetClass' => Formulir::className(), 'targetAttribute' => ['formulir_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'formulir_id' => Yii::t('app', 'Formulir ID'),
            'aspek_penilaian_id' => Yii::t('app', 'Aspek Penilaian ID'),
            'kriteria_penilaian' => Yii::t('app', 'Kriteria Penilaian'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspekPenilaian()
    {
        return $this->hasOne(AspekPenilaian::className(), ['id' => 'aspek_penilaian_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulir()
    {
        return $this->hasOne(Formulir::className(), ['id' => 'formulir_id']);
    }
}
