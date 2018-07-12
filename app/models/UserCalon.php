<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "user_calon".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nama_calon
 * @property integer $usia
 * @property string $pendidikan
 * @property string $jabatan_yang_dilamar
 * @property string $phone
 * @property string $email
 * @property integer $keputusan_id
 * @property string $cv
 * @property string $cv_extension
 *
 * @property KeputusanTipe $keputusan
 * @property User $user
 */
class UserCalon extends \yii\db\ActiveRecord
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
        return 'user_calon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'keputusan_id'], 'integer'],
            ['usia', 'number'],
            [['nama_calon', 'usia', 'pendidikan', 'jabatan_yang_dilamar', 'phone', 'email'], 'required'],
            [['pendidikan', 'jabatan_yang_dilamar'], 'string'],
            [['nama_calon', 'phone'], 'string', 'max' => 50],
            [['cv', 'cv_extension'], 'string'],
            [['email'], 'email'],
            [['keputusan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KeputusanTipe::className(), 'targetAttribute' => ['keputusan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'nama_calon' => Yii::t('app', 'Nama Calon'),
            'usia' => Yii::t('app', 'Usia'),
            'pendidikan' => Yii::t('app', 'Pendidikan'),
            'jabatan_yang_dilamar' => Yii::t('app', 'Jabatan yang Dilamar'),
            'phone' => Yii::t('app', 'No Telp'),
            'email' => Yii::t('app', 'Email'),
            'keputusan_id' => Yii::t('app', 'Keputusan'),
            'cv' => Yii::t('app', 'File CV'),
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getStatus($param = null)
    {
        $array = [
            1 => 'Sudah di Interview',
            2 => 'Belum di Interview'
        ];

        return !empty($param) ? $array[$param] : $array;
    }

    public static function getCalonList()
    {
        $query = Yii::$app->db->createCommand("SELECT id, concat(nama_calon, ' (Telp: ', phone, ')') as nama FROM user_calon WHERE `status`=2")->queryAll();

        return ArrayHelper::map($query, 'id', 'nama');
    }

    public function downloadFile($filename, $namaCalon)
    {
        return '<a target="_blank" href="' . Url::to(['/user-calon/download-cv', 'f' => $filename, 'i' => $namaCalon]) . '"> Download CV </a>';
    }
}
