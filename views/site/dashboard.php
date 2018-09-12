<?php
use kartik\tabs\TabsX;
?>
<div id="dash-tabs">
<div class="row">
    <?=TabsX::widget([
        'items'=>[
            [
                'label'=>'<i class="glyphicon glyphicon-home"></i> Application List',
                'content'=> $content,
                'linkOptions'=> ['data-url'=>\yii\helpers\Url::to(['/appl-list/index', 'active'=>true])],
                'active'=> true,
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-th-list"></i> Roles',
                'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/appl-auth-item/index', 'type' => 1])],
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-th-list"></i> Permissions',
                'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/appl-auth-item/index', 'type' => 2])],
            ],
            [
                'label'=>'<i class="glyphicon glyphicon-user"></i> Assignments',
                'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/appl-auth-assignment/index'])],
            ],
        ],
        'position'=>TabsX::POS_ABOVE,
        'encodeLabels'=>false
    ]);?>
</div>
</div>