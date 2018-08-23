<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthAssignment */

$this->title = Yii::t('app', 'Create Appl Auth Assignment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Assignments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-assignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
