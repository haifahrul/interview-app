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
 * @property integer $keputusan_interviewer
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

    const SCENARIO_KEPUTUSAN_INTERVIEWER = 'keputusanInterviewer'; 

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

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_KEPUTUSAN_INTERVIEWER] = ['keputusan_interviewer'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['calon_id', 'interviewer_id', 'tanggal_wawancara', 'catatan', 'keputusan_id', 'nilai'], 'required'],
            [['calon_id', 'interviewer_id', 'tanggal_wawancara'], 'required'],
            ['keputusan_interviewer', 'integer'],
            [['calon_id', 'interviewer_id', 'keputusan_id'], 'safe'],
            [['tanggal_wawancara', 'timestamp'], 'safe'],
            [['catatan'], 'string'],
            [['nilai'], 'number'],
            [['keputusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KeputusanTipe::className(), 'targetAttribute' => ['keputusan_id' => 'id']],
            [['calon_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserCalon::className(), 'targetAttribute' => ['calon_id' => 'id']],
            [['interviewer_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserInterviewer::className(), 'targetAttribute' => ['interviewer_id' => 'id']],
            [['keputusan_interviewer'], 'required', 'on' => self::SCENARIO_KEPUTUSAN_INTERVIEWER],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'calon_id' => Yii::t('app', 'Nama Kandidat'),
            'interviewer_id' => Yii::t('app', 'Nama Interviewer'),
            'tanggal_wawancara' => Yii::t('app', 'Tanggal Wawancara'),
            'catatan' => Yii::t('app', 'Catatan'),
            'keputusan_id' => Yii::t('app', 'Keputusan by Sistem'),
            'keputusan_interviewer' => Yii::t('app', 'Keputusan Interviewer'),
            'nilai' => Yii::t('app', 'Nilai'),
            'timestamp' => Yii::t('app', 'Timestamp'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeputusan()
    {
        return $this->hasOne(KeputusanTipe::className(), ['id' => 'keputusan_id'])->from(['keputusan' => KeputusanTipe::tableName()]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeputusanInterviewer()
    {
        return $this->hasOne(KeputusanTipe::className(), ['id' => 'keputusan_interviewer'])->from(['keputusan_interviewer' => KeputusanTipe::tableName()]);
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

    public function perhitungan($formulirId, $jumlahPertanyaan) {
        $jumlahPertanyaan = Yii::$app->db->createCommand('SELECT count(kriteria_penilaian) + (SELECT count(kriteria_penilaian) FROM formulir_kompetensi_posisi WHERE formulir_id=:id) as jumlah_pertanyaan FROM formulir_kriteria_penilaian WHERE formulir_id=:id')->bindValue(':id', $formulirId)->queryScalar();

        var_dump($jumlahPertanyaan);
    }
}
