<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplList */

$this->title = Yii::t('app', 'Create an Application');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Application List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
