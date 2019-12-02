<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
?>
<h1>Событие</h1>
<?= Html::a('Создать', Url::to(['event/create']), [
    'class' => 'btn btn-primary'
]) ?>

<?= Html::a('Редактировать', Url::to(['event/update']), [
    'class' => 'btn btn-success'
]) ?>

<?= Html::a('Удалить', Url::to(['event/delete']), [
    'class' => 'btn btn-danger'
]) ?>
<h2>Описание события</h2>
<p>
  <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi asperiores aspernatur assumenda at cum dignissimos dolor dolore, doloribus eaque expedita ipsa maiores, molestias, nam nemo nulla quas quia temporibus?</span><span>A accusamus accusantium alias animi aspernatur consectetur deleniti dolorum ducimus et eum excepturi expedita explicabo in inventore ipsam magni minus natus obcaecati repellendus saepe, sed soluta sunt suscipit tempore veritatis?</span><span>Aliquam et expedita id inventore officia quaerat qui voluptates! Autem dolore error laboriosam molestias odio quaerat repellendus saepe sapiente. Cupiditate earum itaque neque quae repellat sunt voluptate. Consequuntur, ipsam magni.</span><span>Incidunt nesciunt tenetur unde! A amet aperiam architecto, atque consequuntur delectus, deleniti distinctio dolore, dolorum error inventore laborum maiores minus molestiae natus nulla officia quae quaerat quia quibusdam sed sequi!</span><span>At consequuntur dicta ea fuga fugiat harum hic impedit perspiciatis, quis sit soluta, ullam, veniam vitae? Adipisci dolorem nemo pariatur unde! Blanditiis dicta facere iure labore quo ratione rerum sunt?</span><span>Cumque delectus dolore dolorem ea eaque enim illo ipsum magnam magni minima nemo, nesciunt numquam odit, provident quaerat quas velit. Deserunt dignissimos eligendi in magni maiores praesentium ratione sequi ut?</span><span>Animi asperiores, eos illum incidunt molestiae possimus praesentium quibusdam? Dignissimos quas sapiente soluta! Accusantium dolorem earum in laudantium maiores molestiae pariatur tempora! Cupiditate eum exercitationem itaque iusto nemo suscipit, temporibus.</span><span>Accusantium adipisci eos exercitationem id maiores minima praesentium quidem sequi. Ab, consequuntur dolor ducimus fuga harum minus modi nihil nisi perspiciatis rerum sequi tempora totam. Enim nesciunt nobis nulla ullam.</span><span>Consequatur corporis cumque dignissimos dolore doloribus explicabo id necessitatibus, nostrum, quas quis repellat, unde veniam voluptate. Animi debitis distinctio eligendi eum expedita harum ipsum necessitatibus omnis optio, sit suscipit, voluptatum?</span><span>Accusamus adipisci architecto aspernatur beatae commodi culpa cum doloremque eius est ex id iste iusto maxime nam, nisi nulla odio odit optio pariatur possimus repudiandae saepe tempore vero voluptas voluptate.</span>
</p>

<?=Html::a('Назад в календарь ' . '<span class="glyphicon glyphicon-time" aria-hidden="true"></span>',
    Url::to(['calendar/index']),
    ['class' => 'btn btn-default btn-lg'])?>
