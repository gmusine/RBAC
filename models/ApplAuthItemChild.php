<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appl_auth_item_child}}".
 *
 * @property string $parent
 * @property string $child
 *
 * @property ApplAuthItem $parent0
 * @property ApplAuthItem $child0
 */
class ApplAuthItemChild extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%appl_auth_item_child}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['parent', 'child'], 'required'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent', 'child'], 'unique', 'targetAttribute' => ['parent', 'child']],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => ApplAuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
            [['child'], 'exist', 'skipOnError' => true, 'targetClass' => ApplAuthItem::className(), 'targetAttribute' => ['child' => 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'parent' => Yii::t('app', 'Parent'),
            'child' => Yii::t('app', 'Child'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0() {
        return $this->hasOne(ApplAuthItem::className(), ['name' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild0() {
        return $this->hasOne(ApplAuthItem::className(), ['name' => 'child']);
    }

    public static function updateChildren($parent, $list)
    {
        if(($model = ApplAuthItem::findOne($parent)) !== null ) {
            $current_children = (ApplAuthItemChild::findAll(['parent' => $parent]));
            if(is_array($list)){
            $toAdd = array_diff($list, \yii\helpers\ArrayHelper::map($current_children, 'child', 'child'));
            $toRemove = array_diff(yii\helpers\ArrayHelper::map($current_children, 'child', 'child'), $list);
            $model->removeChildren($toRemove);
            $model->addChildren($toAdd);
            }
        }
    }

}
