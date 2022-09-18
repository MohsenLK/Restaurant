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
'attribute' => 'name',
'label' => 'نام',
'value' => function ($model) {
return $model->name;
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
'attribute' => 'quantity',
'label' => 'تعداد',
'value' => function ($model) {
 return $model->quantity;
}
],
],
'pjax' => true,
]);
