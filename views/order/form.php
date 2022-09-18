<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var ActiveForm $form */

?>
<div class="new-department">

    <?php $form = ActiveForm::begin(); ?>
        <?php
            echo $form->field($model, 'user')->widget(Select2::classname(), [
            'data' => $userDropDown,
            'options' => ['placeholder' => 'نام کاربر مدنظر را انتخاب کنید'],
            'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false,
                ],
            ]);
        ?>
        <?= $form->field($model, 'adress') ?>
        <?php
            echo $form->field($model, 'department_id')->widget(Select2::classname(), [
            'data' => $shobeDropDown,
            'options' => ['placeholder' => 'نام شعبه مدنظر را انتخاب کنید', 'id' => 'dep-id'],
            'pluginOptions' => [
            'allowClear' => true,
            ],
            ]);
            echo $form->field($model, 'food_id')->widget(DepDrop::classname(), [
                'options'=>['id'=>'food-id'],
                'pluginOptions'=>[
                    'depends'=>['dep-id'],
                    'placeholder'=>'غذای مدنظر را انتخاب کنید',
                    'url'=>Url::to(['/order/subcat'])
                ]
            ]);
            
        ?>
        
        <div class="form-group">
            <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- new-food -->
