<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Events;

/**
 * EventsSearch represents the model behind the search form of `app\models\Events`.
 */
class EventsSearch extends Events
{
    public $authorName;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'is_full_day', 'is_repeatable', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'authorName'], 'safe'],
            [['start', 'end'], 'date', 'format' => 'php:d.m.Y'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public
    function search($params)
    {
        $query = Events::find();

        $user = \Yii::$app->user;

        if (!$user->can('admin')) {
            $query->andWhere(['author_id' => $user->id]);
        };


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        if (!empty($this->start)) {
            $this->filterByDate('start', $query);
        }
        if (!empty($this->end)) {
            $this->filterByDate('end', $query);
        }
        if (!empty($this->created_at)) {
            $this->filterByDate('created_at', $query);
        }
        if (!empty($this->updated_at)) {
            $this->filterByDate('updated_at', $query);
        }

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['author']);
            return $dataProvider;
        }

        $this->addCondition($query, 'author_id');

        $dataProvider->setSort([
            'attributes' => [

                'id' => [
                    'asc' => ['id' => SORT_DESC],
                    'desc' => ['id' => SORT_ASC]
                ],
                'name' => [
                    'asc' => ['name' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC]
                ],
                'start' => [
                    'asc' => ['start' => SORT_ASC],
                    'desc' => ['start' => SORT_DESC]
                ],
                'end' => [
                    'asc' => ['end' => SORT_ASC],
                    'desc' => ['end' => SORT_DESC]
                ],
                'authorName' => [
                    'asc' => ['users.username' => SORT_ASC],
                    'desc' => ['users.username' => SORT_DESC]
                ],
                'is_repeatable' => [
                    'asc' => ['is_repeatable' => SORT_ASC],
                    'desc' => ['is_repeatable' => SORT_DESC],
                ],
                'is_full_day' => [
                    'asc' => ['is_full_day' => SORT_ASC],
                    'desc' => ['is_full_day' => SORT_DESC],
                ],
                'created_at' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'desc' => ['created_at' => SORT_DESC],
                ],
                'updated_at' => [
                    'asc' => ['updated_at' => SORT_ASC],
                    'desc' => ['updated_at' => SORT_DESC],
                ],
            ],
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'is_repeatable' => $this->is_repeatable,
            'is_full_day' => $this->is_full_day,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        $query->joinWith(['author' => function ($q) {
            $q->where('users.username LIKE "%' . $this->authorName . '%"');
        }]);

        return $dataProvider;
    }

    private function filterByDate($attr, $query)
    {
        $dayStart = (int)\Yii::$app->formatter->asTimestamp($this->$attr . ' 00:00:00');
        $dayStop = (int)\Yii::$app->formatter->asTimestamp($this->$attr . ' 23:59:59');
        $query->andFilterWhere([
            'between',
            self::tableName() . ".$attr",
            $dayStart,
            $dayStop,
        ]);
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }
        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
