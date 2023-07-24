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
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gifFile' => 'gifFile',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
          // var_dump($this->gifFile); exit;
            $this->gifFile->saveAs('uploads/test.gif');
            $this->gifFile = 'uploads/test.gif';
            return $this->save();
        } else {
            return false;
        }
    }
}