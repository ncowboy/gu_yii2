<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $name
 * @property int|null $start
 * @property int|null $end
 * @property int|null $author_id
 * @property string|null $description
 * @property int|null $is_full_day
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $is_repeatable
 *
 * @property Calendar[] $calendars
 * @property User $user
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'start'], 'required'],
            [['author_id', 'start', 'end', 'is_full_day', 'is_repeatable', 'created_at', 'updated_at'], 'integer'],
            [['end'], 'ifEndEmpty', 'skipOnEmpty' => false],
            [['end'], 'checkEndDate', 'skipOnError' => false, 'skipOnEmpty' => false],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 4096],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'start' => 'Дата/время начала',
            'end' => 'Дата/время окончания',
            'author_id' => 'Пользователь',
            'description' => 'Описание',
            'is_full_day' => 'На весь день',
            'is_repeatable' => 'Повторяется',
            'authorName' => 'Автор',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendars()
    {
        return $this->hasMany(Calendar::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    public function getAuthorName()
    {
        return $this->author->username;
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (is_null($this->author_id)) {
            $this->author_id = Yii::$app->getUser()->getId();
            $this->save();
        }
    }

    public function ifEndEmpty($attribute)
    {
        if (empty($this->$attribute)) {
            $this->$attribute = $this->start;
        }
    }

    public function checkEndDate($attribute)
    {
        if ($this->$attribute < $this->start) {
            $this->addError($attribute, 'Дата окончания не может быть позднее даты начала');
            return false;
        }
    }
}
