<?php
use kartik\tabs\TabsX;
use yii\helpers\ArrayHelper;
use app\models;

    echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);