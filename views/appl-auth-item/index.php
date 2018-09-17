<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplAuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Application Items');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?=Html::button('Add New Item', [
            'value' => Url::to(['appl-auth-item/create']),
            'type'=>'button', 
            'class' => 'btn btn-xs btn-primary showModalButton',
            'title' => 'Add New Item'
        ])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            'description:ntext',
            'rule_name',
            'data:ntext',
            //'created_at',
            //'updated_at',
            'fk_app_list',

            [
                'header' => 'Actions',
                'format' => 'raw',
                'options' => [
                    'width' => '180px',
                ],
                'value' => function($data){
                    return Html::button('View', [
                        'value' => Url::to(['appl-auth-item/view', 'id'=>$data->name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-primary showModalButton',
                        'title' => 'View Application Item'
                    ]) . ' | ' .
                    Html::button('Update', [
                        'value' => Url::to(['appl-auth-item/update', 'id'=>$data->name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-warning showModalButton',
                        'title' => 'Update Application Item'
                    ]) . ' | '. 
                            Html::button('Delete', [
                        'value' => Url::to(['appl-auth-item', 'id'=>$data->name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-danger showModalButton',
                        'title' => 'Delete Application Item',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                }
            ],
        ],
    ]); ?>
</div>
