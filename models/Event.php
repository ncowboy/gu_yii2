<?php


namespace app\models;


use yii\base\Model;

class Event extends Model

/**
 * @property boolean $isRepeatable может ли повторяться
 * @property boolean $isBlocking может ли быть блокирующим (в этот же день не может быть других событий)
 *
 */
{
    public $isRepeatale;
    public $isBlocking;

}