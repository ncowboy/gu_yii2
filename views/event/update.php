<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form ActiveForm */
?>

<h1>Редактирование события</h1>

<div class="event-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'start') ?>
    <?= $form->field($model, 'finish') ?>
    <?= $form->field($model, 'isRepeatable') ?>
    <?= $form->field($model, 'isBlocking') ?>
    <?= $form->field($model, 'description') ?>

  <div class="form-group">
      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
  </div>
    <?php ActiveForm::end(); ?>

</div>
