<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "log_error".
 *
 * @property integer $id
 * @property string $message
 * @property string $data_json
 * @property string $date_error
 */
class LogError extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
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
        return 'log_error';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'data_json'], 'string'],
            [['date_error'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'message' => Yii::t('app', 'Message'),
            'data_json' => Yii::t('app', 'Data'),
            'date_error' => Yii::t('app', 'Date'),
        ];
    }
}
