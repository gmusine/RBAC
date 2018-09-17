<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */

$this->title = Yii::t('app', 'Update Application Item: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="appl-auth-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
