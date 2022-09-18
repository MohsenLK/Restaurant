<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\app\NewController;
/** @var yii\web\View $this */
/** @var app\models\Food $model */
/** @var ActiveForm $form */

?>
<div class="new-food">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?php
       ;        
        echo $form->field($model, 'type')->widget(Select2::classname(), [
            'data' =>  $items = [
                'ایرانی' => 'ایرانی', 
                'فست فود' => 'فست فود'
            ],
            'options' => ['placeholder' => 'نوع غذا را انتخاب کنید ...', 'value' => $model],
            'pluginOptions' => [
                'allowClear' => false,
            ],
        ]);
         ?>
        <?= $form->field($model, 'contents') ?>
        <?= $form->field($model, 'recipe') ?>
        <?= $form->field($model, 'quantity') ?>
    
        <div class="form-group">
            <?= Html::submitButton('ثبت', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- new-food -->
