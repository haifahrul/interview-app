<?php

namespace app\widgets\admin\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $no_telp
 * @property string $theme
 * @property string $avatar 
 *
 * @property User $user
 */
class UserProfile extends \yii\db\ActiveRecord {

    public $imageFile;

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
    public static function tableName() {
        return 'user_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['firstname'], 'required'],
            [['firstname', 'lastname', 'no_telp', 'theme'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['firstname'], 'required', 'on' => 'create'],
            [['theme'], 'required', 'on' => 'update-theme'],
            ['no_telp', 'number'],
            [['avatar'], 'string', 'max' => 225],
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => ['png', 'jpg', 'img'], 'maxSize' => 1024 * 1024],
        ];
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['firstname'];
        $scenarios['update-profile'] = ['firstname', 'lastname', 'no_telp', 'imageFile'];
        $scenarios['update-theme'] = ['theme'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'firstname' => Yii::t('app', 'Nama Depan'),
            'lastname' => Yii::t('app', 'Nama Belakang'),
            'no_telp' => Yii::t('app', 'No Telp'),
            'theme' => Yii::t('app', 'Tema'),
            'avatar' => Yii::t('app', 'Avatar'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getAvatar() {        
        if (!empty($this->avatar) && file_exists(Yii::$app->params['uploadsPath'] . '/avatar/' . $this->avatar)) {
            return Yii::$app->params['uploadsUrl'] . '/avatar/' . $this->avatar;
        } else {
            return Yii::$app->params['defaultImage'];
        }
    }

    public function upload() {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/avatar/' . $this->avatar);

            return true;
        } else {
            return false;
        }
    }
    
    public static function getImageAvatar() {
        if (!empty(Yii::$app->user->identity->userProfile->avatar) && file_exists(Yii::$app->params['uploadsPath'] . '/avatar/' . Yii::$app->user->identity->userProfile->avatar)) {
            return Yii::$app->params['uploadsUrl'] . '/avatar/' . Yii::$app->user->identity->userProfile->avatar;
        } else {
            return Yii::$app->params['defaultImage'];
        }
    }

}
