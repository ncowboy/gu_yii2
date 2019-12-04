<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Event */
/* @var $form ActiveForm */
?>

<h1>Редактирование события</h1>

<div class="event-update">

  <?= $this->render('form', ['model' => new \app\models\Event()]) ?>

</div>
