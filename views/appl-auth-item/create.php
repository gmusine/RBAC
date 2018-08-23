<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */

$this->title = Yii::t('app', 'Create Appl Auth Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
