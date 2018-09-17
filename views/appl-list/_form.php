<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApplList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appl-list-form">

    <?php $form = ActiveForm::begin(['options'=>['id'=>'create-appl-list']]); ?>

    <?= $form->field($model, 'app_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dev_framework')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->listBox([1 => 'Active', 0 => 'Inactive'], ['prompt' => 'Select Status', 'size' => 1])?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
