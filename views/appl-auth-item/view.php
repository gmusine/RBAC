<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ApplAuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appl Auth Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Update', [
            'value' => Url::to(['appl-auth-item/update', 'id'=>$model->name]),
            'type'=>'button', 
            'class' => 'btn btn-xs btn-primary showModalButton',
            'title' => 'Update Application Item'
        ]) ?>
        <?= Html::button('Delete', [
            'value' => Url::to(['appl-auth-item/delete', 'id'=>$model->name]),
            'type'=> 'button',
            'class' => 'btn btn-xs btn-danger showModalButton',
            'title' => 'Delete Application Item',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data:ntext',
            'created_at',
            'updated_at',
            'fk_app_list',
        ],
    ]) ?>

</div>
