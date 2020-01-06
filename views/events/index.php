<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="events-index">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Create Events', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            [
                'attribute' => 'start',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'start',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Events $model) {
                    return Yii::$app->formatter->asDateTime($model->start);
                }
            ],
            [
                'attribute' => 'end',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'end',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Events $model) {
                    return Yii::$app->formatter->asDateTime($model->start);
                }
            ],
            'authorName',
            [
                'attribute' => 'is_repeatable',
                'filter' => [0 => "Нет", 1 => "Да"],
                'value' => function (\app\models\Events $model) {
                    return $model->is_repeatable ? 'Да' : 'Нет';
                }
            ],
            [
                'attribute' => 'is_full_day',
                'filter' => [0 => 'Нет', 1 => 'Да'],
                'value' => function (\app\models\Events $model) {
                    return $model->is_full_day ? 'Да' : 'Нет';
                }
            ],
            //'description',
            [
                'attribute' => 'created_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Events $model) {
                    return Yii::$app->formatter->asDateTime($model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'updated_at',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ],
                ]),
                'value' => function (\app\models\Events $model) {
                    return Yii::$app->formatter->asDateTime($model->updated_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
