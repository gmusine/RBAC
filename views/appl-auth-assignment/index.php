<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use app\models;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplAuthAssignmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Role or Permission Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-auth-assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Assign Role or Permission',[
            'value'=> Url::to('appl-auth-assignment/create'),
            'type'=> 'button',
            'class'=> 'btn btn-xs btn-primary showModalButton',
            'title'=> 'Assign new Role or Permission',
       ])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            'user_id',
            'created_at',
            'fk_app_list',

            [
                'header' => 'Actions',
                'format' => 'raw',
                'options' => [
                    'width' => '173px',
                ],
                'value' => function($data){
                    return Html::button('View', [
                        'value' => Url::to(['appl-auth-assignment/view', 'item_name'=>$data->item_name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-primary showModalButton',
                        'title' => 'View Item Assignment'
                    ]) . ' | ' .
                    Html::button('Update', [
                        'value' => Url::to(['appl-auth-assignment/update', 'item_name'=>$data->item_name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-warning showModalButton',
                        'title' => 'Update Item Assignment'
                    ]) . ' | '. 
                            Html::button('Delete', [
                        'value' => Url::to(['appl-auth-assignment/delete', 'item_name'=>$data->item_name]),
                        'type'=>'button', 
                        'class' => 'btn btn-xs btn-danger showModalButton',
                        'title' => 'Delete Item Assignment',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post','data-pjax' => false,
                        ],
                    ]);
                }
            ],
        ],
    ]); ?>
</div>
