<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItemChild */

$this->title = Yii::t('app', 'Update Appl Auth Item Child: ' . $model->parent, [
    'nameAttribute' => '' . $model->parent,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Item Children'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="appl-auth-item-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
