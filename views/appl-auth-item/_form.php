<?php

use yii\helpers\Html;
use yii\db\ActiveRecord;
use yii\widgets\ActiveForm;
use app\models\ApplList;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appl-auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->listBox([1 => 'Role', 2 => 'Permission'], ['text' => 'Select Item Type', 'size' => 1])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

   <!-- <?= $form->field($model, 'created_at')->textInput() ?> 

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <?= $form->field($model, 'fk_app_list')->dropDownList(ArrayHelper::map(ApplList::find()->all(),'id', 'app_name'),['prompt'=>'Select Application']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
