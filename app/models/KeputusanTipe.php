<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "keputusan_tipe".
 *
 * @property integer $id
 * @property string $nama
 * @property double $range_nilai_1
 * @property double $range_nilai_2
 * @property integer $is_active
 *
 * @property Formulir[] $formulirs
 * @property UserCalon[] $userCalons
 */
class KeputusanTipe extends \yii\db\ActiveRecord
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
        return 'keputusan_tipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'range_nilai_1', 'range_nilai_2'], 'required'],
            [['range_nilai_1', 'range_nilai_2'], 'number'],
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
            'range_nilai_1' => Yii::t('app', 'Range Nilai 1'),
            'range_nilai_2' => Yii::t('app', 'Range Nilai 2'),
            'is_active' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormulirs()
    {
        return $this->hasMany(Formulir::className(), ['keputusan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserCalons()
    {
        return $this->hasMany(UserCalon::className(), ['keputusan_id' => 'id']);
    }

    public static function getListData() 
    {
        $query = Yii::$app->db->createCommand('SELECT * FROM keputusan_tipe WHERE is_active=1')->queryAll();
        
        return ArrayHelper::map($query, 'id', 'nama');
    }

}
