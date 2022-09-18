<?php
use kartik\grid\GridView;

//estefade az dataviget baraye namayeshe etelaat be shekle jadval
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
'attribute' => 'type',
'label' => 'نوع غذا',
'value' => function ($model) {
return $model->type;
}
],
[
'attribute' => 'contents',
'label' => 'محتویات',
'value' => function ($model) {
 return $model->contents;
}
],
[
'attribute' => 'recipe',
'label' => 'نحوه ساخت',
'value' => function ($model) {
return $model->recipe;
}
],
[
'attribute' => 'quantity',
'label' => 'تعداد',
'value' => function ($model) {
return $model->quantity;
}
]
],
'pjax' => true,
]);
