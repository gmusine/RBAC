<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthAssignment */

$this->title = Yii::t('app', 'Assign Role or Permission ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Role or Permission Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-assignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
