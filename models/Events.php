<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $name
 * @property int|null $start
 * @property int|null $end
 * @property int|null $author_id
 * @property string|null $description
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
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'start'], 'required'],
      [['author_id', 'start', 'end'], 'integer'],
      ['end', 'default', 'value' => function ($model) {
        return $model->start;
      }, 'when' => function($model) {
        return $model->end > $model->start;
      }],
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
      'name' => 'Name',
      'start' => 'Start',
      'end' => 'End',
      'author_id' => 'Id User',
      'description' => 'Description',
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
  public function getUser()
  {
    return $this->hasOne(User::className(), ['id' => 'author_id']);
  }

  public function afterSave($insert, $changedAttributes)
  {
    if (is_null($this->author_id)) {
      $this->author_id = Yii::$app->getUser()->getId();
      $this->save();
    }
  }
}
