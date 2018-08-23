<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appl_auth_assignment}}".
 *
 * @property string $item_name
 * @property string $user_id
 * @property int $created_at
 * @property int $fk_app_list
 *
 * @property ApplAuthItem $itemName
 * @property ApplList $fkAppList
 */
class ApplAuthAssignment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%appl_auth_assignment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'user_id'], 'required'],
            [['created_at', 'fk_app_list'], 'integer'],
            [['item_name', 'user_id'], 'string', 'max' => 64],
            [['item_name', 'user_id'], 'unique', 'targetAttribute' => ['item_name', 'user_id']],
            [['item_name'], 'exist', 'skipOnError' => true, 'targetClass' => ApplAuthItem::className(), 'targetAttribute' => ['item_name' => 'name']],
            [['fk_app_list'], 'exist', 'skipOnError' => true, 'targetClass' => ApplList::className(), 'targetAttribute' => ['fk_app_list' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_name' => Yii::t('app', 'Item Name'),
            'user_id' => Yii::t('app', 'User ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'fk_app_list' => Yii::t('app', 'Fk App List'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemName()
    {
        return $this->hasOne(ApplAuthItem::className(), ['name' => 'item_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkAppList()
    {
        return $this->hasOne(ApplList::className(), ['id' => 'fk_app_list']);
    }
    public function beforeSave($insert) 
    {
        if($this-> isNewRecord){
            $this->created_at = time();
        }
      /*  if (empty($this->rule_name))
            {
            $this->rule_name = null;
            }*/
       return parent::beforeSave($insert);
    }
}
