<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'email:email',
            //'status',
            [
                'attribute' => 'created_at',
                'value' => function (\app\models\User $model) {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function (\app\models\User $model) {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}'],
        ],
    ]); ?>


</div>
