<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthRule */

$this->title = Yii::t('app', 'Create Appl Auth Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
