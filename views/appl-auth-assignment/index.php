<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
            'value'=> Url::to('/index.php?r=appl-auth-assignment%2Fcreate'),
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
