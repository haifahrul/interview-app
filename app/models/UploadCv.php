<?php 

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadCv extends Model
{
    /**
     * @var UploadedFile
     */
    public $fileCv;
    public $filename;
    public $fileExtension;

    public function rules()
    {
        return [
//            [['fileCv'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf, jpeg, png, jpg, img'],
            [['fileCv'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->filename = sha1($this->fileCv->baseName . microtime()) . '.' . $this->fileCv->extension;
            $this->fileExtension = $this->fileCv->extension;
            $this->fileCv->saveAs(Yii::$app->params['uploadsPath'] . 'cv/' . $this->filename);
            return true;
        } else {
            return false;
        }
    }
}
?>