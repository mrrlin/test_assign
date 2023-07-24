<?php

namespace app\controllers;

use Yii;
//test-assignment/site/watermarkuse app\models\Gif;
use yii\web\UploadedFile;
use app\models\Gif;
use yii\web\Controller;

class WatermarkController extends \yii\web\Controller
{

  static function copyResizedImage($inputFile, $outputFile, $width, $height = null, $crop = true)
  {
      if (extension_loaded('gd'))
      {
          $image = new GD($inputFile);
          if($height) {
              if($width && $crop){
                  $image->cropThumbnail($width, $height);
              } else {
                  $image->resize($width, $height);
              }
          } else {
              $image->resize($width);
          }
          return $image->save($outputFile);
      }

      $image = new \Imagick($inputFile);

      $image->adaptiveResizeImage($width, $height);

      if($height && $crop){
          $image->cropThumbnailImage($width, $height);
      }

      $info = pathinfo($inputFile);
      if(in_array(strtolower($info['extension']),['gif']))
      {
          $image->setImageFormat('gif');
          $image->setImageCompressionQuality(80);
      }


      return $image->writeImage($outputFile);
  }

  public function actionWatermark()
  {
      $model = new Gif();
      if(Yii::$app->request->isPost) {
        $model->gifFile = UploadedFile::getInstance($model, 'gifFile');

          
        if ($model->upload()) {
            // file is uploaded successfully
            return $this->render('watermark', ['model' => $model, ]);
        }
      }
      
      //   $imageFile = UploadedFile::getInstance($model, 'gifFile');
      //   var_dump($gifFile);
      //   exit;
      //   $parame = \Yii::$app->request->post('gifFile');
      // }
    
      // exit();

      // if (Yii::$app->request->isPost) {
      //     $model->gifFile = UploadedFile::getInstance($model, 'gifFile');


      // }

      return $this->render('watermark', ['model' => $model, ]);
    
  }
}