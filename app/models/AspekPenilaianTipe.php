<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "aspek_penilaian_tipe".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $is_active
 *
 * @property AspekPenilaian[] $aspekPenilaians
 */
class AspekPenilaianTipe extends \yii\db\ActiveRecord
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
        return 'aspek_penilaian_tipe';
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
    public function getAspekPenilaians()
    {
        return $this->hasMany(AspekPenilaian::className(), ['aspek_penilaian_tipe_id' => 'id']);
    }

    public static function getListData() 
    {
        $query = Yii::$app->db->createCommand('SELECT * FROM aspek_penilaian_tipe WHERE is_active=1')->queryAll();
        
        return ArrayHelper::map($query, 'id', 'nama');
    }
}
