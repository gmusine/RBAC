<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Application List');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::button('Add New Application', [
            'value' => Url::to(['appl-list/create']),
            'type'=>'button', 
            'class' => 'btn btn-xs btn-primary showModalButton',
            'title' => 'Add New Application'
        ])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'app_name',
            'description:ntext',
            'dev_framework',
            'owner',
            //'url:url',
            //'fk_study',
            //'date_created',
            //'date_modified',
            //'feature_image',
            //'status',
            [
                'header' => 'Actions',
                'format' => 'raw',
                'options' => [
                    'width' => '173px',
                ],
                'value' => function($data){
                    return Html::button('View', [
                        'value' => Url::to(['appl-list/view', 'id'=>$data->id]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-primary showModalButton',
                        'title' => 'View Application'
                    ]) . ' | ' .
                    Html::button('Update', [
                        'value' => Url::to(['appl-list/update', 'id'=>$data->id]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-warning showModalButton',
                        'title' => 'Update Application'
                    ]) . ' | '. 
                            Html::button('Delete', [
                        'value' => Url::to(['appl-list/delete', 'id'=>$data->id]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-danger showModalButton',
                        'title' => 'Delete Application',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]);
                }
            ]

            
        ],
    ]); ?>
</div>
