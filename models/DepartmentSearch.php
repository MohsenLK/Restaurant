<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class DepartmentSearch extends Department
{
    // setup search function for filtering and sorting 
    public function search($params)
    {
        $query = Department::find();
        if (!empty($params['DepartmentSearch'])) {
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
        $query->andFilterWhere(['like', 'adress', $this->adress]);
        $query->andFilterWhere(['like', 'quantity', $this->quantity]);
            return $dataProvider;
    } 
}