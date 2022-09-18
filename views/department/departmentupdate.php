<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\app\NewController;
use yii\helpers\ArrayHelper;
use app\models\Food;

/** @var yii\web\View $this */
/** @var app\models\Department $model */
/** @var ActiveForm $form */

?>
<div class="new-department">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'adress') ?>
        <?= $form->field($model, 'quantity') ?>

        <?php
            echo $form->field($model, 'foodIds')->widget(Select2::classname(), [
            'data' => $foodDropDown,
            'options' => ['placeholder' => 'غذای مدنظر را انتخاب کنید',],
            'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
                ],
            ]);
        ?>
        
        <div class="form-group">
            <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- new-food -->
