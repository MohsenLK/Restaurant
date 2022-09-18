<?php
use yii\widgets\DetailView;

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'attribute' => 'name',
            'label' => "نام",
            'value' => function ($model) {
                return $model->name;
            }
        ],
        'adress',
        'quantity',
        [
            'attribute' => '',
            'label' => "نام غذاها",
            'format' => 'raw',
            'value' => $foodNames,
        ]   
    ],
]);
