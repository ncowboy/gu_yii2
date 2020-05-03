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
        'type' => DateControl::FORMAT_DATETIME
    ]); ?>

    <?= $form->field($model, 'end')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]) ?>

    <?= $form->field($model, 'description')->textarea() ?>

    <?php $model->is_full_day = 0 ?>
    <?= $form->field($model, 'is_full_day')->radioList([
        1 => 'Да',
        0 => 'Нет'

    ]) ?>

    <?php $model->is_repeatable = 0 ?>
    <?= $form->field($model, 'is_repeatable')->radioList([
        1 => 'Да',
        0 => 'Нет'

    ]) ?>

  <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
