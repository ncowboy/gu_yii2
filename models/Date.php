<?php


namespace app\models;


use yii\base\Model;

class Date extends Model

/**
 *
 * @property boolean $isWeekend рабочий или нерабочий день
 * @property string $eventIds связанные события в виде, допустим, json строки
 *
 */
{
    public $isWeekend;
    public $eventIds;

}