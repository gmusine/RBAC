<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApplListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Application List');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appl-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::button('Add a New Application', [
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
            'date_created',
            'date_modified',
            //'feature_image',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
