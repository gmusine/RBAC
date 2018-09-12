<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */

$this->title = Yii::t('app', 'Create New Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Application Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
