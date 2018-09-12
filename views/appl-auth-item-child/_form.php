<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ApplAuthItem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItemChild */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appl-auth-item-child-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent')->dropDownList(ArrayHelper::map(ApplAuthItem::find()->all(),'name', 'name'), ['prompt'=>'Select Parent Role/ Permission']) ?>

    <?= $form->field($model, 'child')->dropDownList(ArrayHelper::map(ApplAuthItem::find()->all(), 'name', 'name'),['prompt'=>'Select Child Role/permission']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


