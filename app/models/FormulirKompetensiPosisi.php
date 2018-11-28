<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "formulir_kompetensi_posisi".
 *
 * @property integer $id
 * @property integer $formulir_id
 * @property string $aspek_penilaian
 * @property integer $kriteria_penilaian
 *
 * @property Formulir $formulir
 */
class FormulirKompetensiPosisi extends \yii\db\ActiveRecord
{
//    public function behaviors() {
//        return [
//            [
//                'class' => BlameableBehavior::className(),
//                'createdByAttribute' => 'created_by',
//                'updatedByAttribute' => 'updated_by',
//            ],
//            'timestamp' => [
//                'class' => 'yii\behaviors\TimestampBehavior',
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
//                ],
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'formulir_kompetensi_posisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        //    [['formulir_id', 'aspek_penilaian', 'kriteria_penilaian'], 'required'],
            [['aspek_penilaian', 'kriteria_penilaian'], 'required'],
            [['formulir_id', 'kriteria_penilaian'], 'integer'],
            [['aspek_penilaian'], 'string', 'max' => 50],
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
            'aspek_penilaian' => Yii::t('app', 'Aspek Penilaian'),
            'kriteria_penilaian' => Yii::t('app', 'Kriteria Penilaian'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulir()
    {
        return $this->hasOne(Formulir::className(), ['id' => 'formulir_id']);
    }
}
