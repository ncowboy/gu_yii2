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
    public $name;
    public $description;
    public $start;
    public $finish;
    public $isRepeatable;
    public $isBlocking;

    public function rules()
    {
        return [
            [['name', 'start', 'finish', 'isRepeatable', 'isBlocking'], 'required'],
            [ ['start'], 'date', 'format' => 'd-m-yy'],
            ['description', 'string', 'max' => 2048],
            [['isRepeatable', 'isBlocking'], 'boolean']
        ];
    }
}