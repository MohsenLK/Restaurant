<?php

namespace app\models;

use yii\data\ActiveDataProvider;

class OrdersSearch extends Orders
{
    public function search($params)
    {
        $query = OrdersSearch::find();
        if (!empty($params['DepartmentSearch'])) {
            $this->load($params);
        }
        $dataProvider = new ActiveDataProvider([
        'query' => $query,
            'pagination' => [
            'pageSize' => 10,
            ],
        ]);
        // $query->joinWith(['department' => function($query) { $query->from(['department' => 'name']); }]);
        $query->andFilterWhere(['like', 'user', $this->user]);
        $query->andFilterWhere(['like', 'adress', $this->adress]);
        $query->andFilterWhere(['like', 'department_id', $this->department_id]);
        $query->andFilterWhere(['like', 'food_id', $this->food_id]);
        return $dataProvider;
    }
}