<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "formulir".
 *
 * @property integer $id
 * @property integer $calon_id
 * @property integer $interviewer_id
 * @property string $tanggal_wawancara
 * @property string $catatan
 * @property integer $keputusan_id
 * @property integer $jadwal_wawancara_id
 * @property double $nilai
 * @property string $timestamp
 *
 * @property KeputusanTipe $keputusan
 * @property UserCalon $calon
 * @property UserInterviewer $interviewer
 * @property FormulirKompetensiPosisi[] $formulirKompetensiPosisis
 * @property FormulirKriteriaPenilaian[] $formulirKriteriaPenilaians
 */
class Formulir extends \yii\db\ActiveRecord
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
        return 'formulir';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calon_id', 'interviewer_id', 'tanggal_wawancara', 'catatan', 'keputusan_id', 'nilai'], 'required'],
            [['calon_id', 'interviewer_id', 'keputusan_id', 'jadwal_wawancara_id'], 'integer'],
            [['tanggal_wawancara', 'timestamp'], 'safe'],
            [['catatan'], 'string'],
            [['nilai'], 'number'],
            [['keputusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KeputusanTipe::className(), 'targetAttribute' => ['keputusan_id' => 'id']],
            [['calon_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCalon::className(), 'targetAttribute' => ['calon_id' => 'id']],
            [['interviewer_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserInterviewer::className(), 'targetAttribute' => ['interviewer_id' => 'id']],
            [['jadwal_wawancara_id'], 'exist', 'skipOnError' => true, 'targetClass' => JadwalWawancara::className(), 'targetAttribute' => ['jadwal_wawancara_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'calon_id' => Yii::t('app', 'Calon'),
            'interviewer_id' => Yii::t('app', 'Interviewer'),
            'tanggal_wawancara' => Yii::t('app', 'Tanggal Wawancara'),
            'catatan' => Yii::t('app', 'Catatan'),
            'keputusan_id' => Yii::t('app', 'Keputusan'),
            'nilai' => Yii::t('app', 'Nilai'),
            'timestamp' => Yii::t('app', 'Timestamp'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeputusan()
    {
        return $this->hasOne(KeputusanTipe::className(), ['id' => 'keputusan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalon()
    {
        return $this->hasOne(UserCalon::className(), ['id' => 'calon_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterviewer()
    {
        return $this->hasOne(UserInterviewer::className(), ['id' => 'interviewer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulirKompetensiPosisis()
    {
        return $this->hasMany(FormulirKompetensiPosisi::className(), ['formulir_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulirKriteriaPenilaians()
    {
        return $this->hasMany(FormulirKriteriaPenilaian::className(), ['formulir_id' => 'id']);
    }
}
