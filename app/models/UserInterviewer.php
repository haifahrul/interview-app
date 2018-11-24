<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user_interviewer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $nama_pewawancara
 * @property integer $jabatan_id
 * @property integer $fakultas_unit_id
 * @property string $avatar
 * @property integer $is_active
 *
 * @property FakultasUnit $fakultasUnit
 * @property Jabatan $jabatan
 * @property User $user
 */
class UserInterviewer extends \yii\db\ActiveRecord
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
        return 'user_interviewer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'jabatan_id', 'fakultas_unit_id', 'is_active'], 'integer'],
            [['nama_pewawancara', 'jabatan_id', 'fakultas_unit_id', 'is_active'], 'required'],
            [['nama_pewawancara'], 'string', 'max' => 50],
//            [['avatar'], 'string', 'max' => 150],
            [['fakultas_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasUnit::className(), 'targetAttribute' => ['fakultas_unit_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
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
            'nama_pewawancara' => Yii::t('app', 'Nama Pewawancara'),
            'jabatan_id' => Yii::t('app', 'Jabatan'),
            'fakultas_unit_id' => Yii::t('app', 'Fakultas/Unit'),
//            'avatar' => Yii::t('app', 'Avatar'),
            'is_active' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultasUnit()
    {
        return $this->hasOne(FakultasUnit::className(), ['id' => 'fakultas_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function getInterviewerList()
    {
        $query = Yii::$app->db->createCommand("SELECT id, nama_pewawancara as nama FROM user_interviewer WHERE `is_active`=1")->queryAll();

        return ArrayHelper::map($query, 'id', 'nama');
    }
}
