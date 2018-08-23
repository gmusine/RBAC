<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ApplList;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appl-auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>
 
    <?= $form->field($model, 'item_name')->dropDownList(ArrayHelper::map(\app\models\ApplAuthItem::find()->all(), 'name', 'name'), ['prompt'=>'Select Role/ Permission']) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

   <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <?= $form->field($model, 'fk_app_list')->dropDownList(ArrayHelper::map(ApplList::find()->all(),'id', 'app_name'), ['prompt'=>'Select Application']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
