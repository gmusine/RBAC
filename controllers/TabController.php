<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models;
use kartik\tabs\TabsX;

class TabController extends Controller 
{


    public function actionTabsData() {
        $html = $this->renderPartial('tabContent');
        return json_encode($html);
        
    }
    public function getTabs()
    {
        $items = [
        [
            'label'=>'<i class="glyphicon glyphicon-home"></i> Home',
            'content'=>$content1,
            'active'=>true
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
            //'content'=>$content2,
            'linkOptions'=>['data-url'=> models\ApplList::findAll()(['Applications'])]
        ],
        [
            'label'=>'Applications',
            //'content'=>$content2,
            'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
        ],
        [
            'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
            //'content'=>$content2,
            'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]
        ],
        ];
    
        return('items');

    }
}
   ?>