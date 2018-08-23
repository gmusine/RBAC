<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthAssignment */

$this->title = Yii::t('app', 'Update Appl Auth Assignment: ' . $model->item_name, [
    'nameAttribute' => '' . $model->item_name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="appl-auth-assignment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
