<?php



use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var yii\web\View $this */
/* @var app\models\Gif $model */

$this->title = ("Watermark");
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-watermark">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>

    <div class="row upload-picture">
        <p class="upload-picture__title mt-5"><b>Tap on the square to upload your gif:</b></p>
        
        <div class="watermark-form">

            <?php 
              $form = ActiveForm::begin([
                'options' => [
                  'enctype' => 'multipart/form-data',
                  'method' => 'post',
                  'action' => 'watermark/watermark']
                ]);
            ?>

                <label for="gif"></label>
                <?= $form->field($model, 'gifFile')->fileInput(['id' => 'gif', 'class' => 'upload-picture__gif'])->label(false) ?>

                <!-- <input type="file" name="watermark" id="watermark"> -->

                <input type="range" name="resize" id="resize">

                <div class="form-group">
                    <?= Html::submitButton('Upload', ['class' => 'btn btn-success btn-upl']) ?>
                </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>