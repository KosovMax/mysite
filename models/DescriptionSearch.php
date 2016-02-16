<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Description;
use app\models\Tag;

/**
 * DescriptionSearch represents the model behind the search form about `app\models\Description`.
 */
class DescriptionSearch extends Description
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['desid', 'tag'], 'integer'],
            [['date', 'header', 'art_body', 'photo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
    public function search($params)
    {
        $query = Description::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'desid' => $this->desid,
            'date' => $this->date,
            'tag' => $this->tag,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'art_body', $this->art_body])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
