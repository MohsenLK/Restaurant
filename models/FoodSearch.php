<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class FoodSearch extends Food
{
    // setup search function for filtering and sorting 
    public function search($params)
    {
        $query = Food::find();
        if (!empty($params['FoodSearch'])) {
            $this->load($params);
        }
        //make query as database
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'type', $this->type]);
        $query->andFilterWhere(['like', 'contents', $this->contents]);
        $query->andFilterWhere(['like', 'recipe', $this->recipe]);
        $query->andFilterWhere(['like', 'quantity', $this->quantity]);
            return $dataProvider;
    } 
}