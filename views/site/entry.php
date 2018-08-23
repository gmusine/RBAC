<?php

/*The entry view dispalys an html form.
 * The view uses a powerful widget called ActiveForm to build the 
 * HTML form. The begin() and end() methods of the widget render 
 * the opening and closing form tags, respectively. Between the 
 * two method calls, input fields are created by the field() method.
 *  The first input field is for the "name" data, and the
 *  second for the "email" data. After the input fields, 
 * the yii\helpers\Html::submitButton() method is called to generate 
 * a submit button.
  */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
$form= ActiveForm::begin();
?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'email')?>

<div class="form-group">
    <?=Html::submitButton('Submit', ['class'=> 'btn btn-primary'])?>
</div>
<?php ActiveForm::end();?>