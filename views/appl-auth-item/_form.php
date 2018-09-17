<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ApplList;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */
/* @var $form yii\widgets\ActiveForm */
$id = ($model->isNewRecord) ? null : $model->name;
$app_id = ($model->isNewRecord) ? 6 : $model->fk_app_list;
?>

<div class="appl-auth-item-form">

    <?php $form = ActiveForm::begin(['options'=>['id'=>'create-appl-item']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->listBox([1 => 'Role', 2 => 'Permission'], ['text' => 'Select Item Type', 'size' => 1])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'children')->widget(Select2::classname(), [
        'data' => app\models\ApplAuthItem::getChildList($model->isNewRecord, $id),
        'options' => ['placeholder' => 'Select Children'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => true
        ],
    ]);?>
    
     <?= $form->field($model, 'fk_app_list')->dropDownList(ArrayHelper::map(ApplList::find()->all(),'id', 'app_name'),['prompt'=>'Select Application']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
