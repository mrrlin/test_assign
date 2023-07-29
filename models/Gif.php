<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Gif extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $gifFile;

    public static function tableName()
    {
        return 'gif';
    }

    public function rules()
    {
        return [
            [['gifFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'gif'],
            [['gifPath'], 'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gifFile' => 'File',
            'gifPath' => 'Gif Path',
        ];
    }

    public function upload()
    {
      if ($this->validate()) {
        $filePath = 'uploads/' . $this->gifFile->baseName . '.' . $this->gifFile->extension;
        // $this->gifFile->saveAs($filePath);
        $this->gifPath = $filePath;
        return $this->save(false);
      } else {
          return false;
      }
    }
}
