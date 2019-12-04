<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'start') ?>
<?= $form->field($model, 'finish') ?>
<?= $form->field($model, 'isRepeatable') ?>
<?= $form->field($model, 'isBlocking') ?>
<?= $form->field($model, 'description') ?>
<?= $form->field($model, 'images')->fileInput(['multiple' => true]) ?>


<div class="form-group">
  <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
