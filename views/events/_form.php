<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">
  <?php $form = ActiveForm::begin(); ?>

  <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

  <?= $form->field($model, 'start')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE
  ]); ?>

  <?= $form->field($model, 'end')->widget(DateControl::classname(), [
    'type' => DateControl::FORMAT_DATE
  ]) ?>

  <?= $form->field($model, 'description')->textarea() ?>

  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
