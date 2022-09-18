<?php
use kartik\grid\GridView;

echo GridView::widget([
'dataProvider' => $dataProvider,
'filterModel' => $searchModel,
'columns' => [
['class' => 'kartik\grid\SerialColumn'], 
['class' => 'yii\grid\CheckboxColumn'], 
['class' => 'yii\grid\ActionColumn'],
[
'attribute' => 'user',
'label' => 'کاربر',
'value' => function ($model) {
return $model->user;
}
],
[
'attribute' => 'adress',
'label' => 'آدرس',
'value' => function ($model) {
return $model->adress;
}
],
[
'attribute' => 'department_id',
'label' => 'شعبه',
'value' => function ($model) {
 return $model->department_id;
}
],
[
'attribute' => 'food_id',
'label' => 'غذا',
'value' => function ($model) {
return $model->food_id;
}
],    
],
'pjax' => true,
]);
