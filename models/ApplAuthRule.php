<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appl_auth_rule}}".
 *
 * @property string $name
 * @property string $data
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ApplAuthItem[] $applAuthItems
 */
class ApplAuthRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%appl_auth_rule}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['data'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthItems()
    {
        return $this->hasMany(ApplAuthItem::className(), ['rule_name' => 'name']);
    }
    public function beforeSave($insert) {
        if($this->isNewRecord)
            {
            $this->created_at = time();
            }
        else
            {
               $this->updated_at = time(); 
            }
           
        parent::beforeSave($insert);
    }
    
}
