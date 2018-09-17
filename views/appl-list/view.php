<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ApplList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Application Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Update',[
            'value' => Url::to(['appl-list/update', 'id'=>$model->id]),
            'type' => 'button',
            'class' => 'btn btn-xs btn-primary showModalButton',
            'title' => 'Update Application',
        ])?>
        <?= Html::button('Delete',[
                'value'=> Url::to(['appl-list/delete', 'id' =>$model->id]),
            'type' => 'button',
            'class' => 'btn btn-xs btn-danger showModalButton',
            'title' => 'Update application',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'app_name',
            'description:ntext',
            'dev_framework',
            'owner',
            'url:url',
            'fk_study',
            'date_created',
            'date_modified',
            'feature_image',
            'status',
        ],
    ]) ?>

</div>
