<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appl_auth_item}}".
 *
 * @property string $name
 * @property int $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property int $created_at
 * @property int $updated_at
 * @property int $fk_app_list
 *
 * @property ApplAuthAssignment[] $applAuthAssignments
 * @property ApplAuthRule $ruleName
 * @property ApplList $fkAppList
 * @property ApplAuthItemChild[] $applAuthItemChildren
 * @property ApplAuthItemChild[] $applAuthItemChildren0
 * @property ApplAuthItem[] $children
 * @property ApplAuthItem[] $parents
 */
class ApplAuthItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%appl_auth_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at', 'fk_app_list'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['name'], 'unique'],
            [['rule_name'], 'exist', 'skipOnError' => true, 'targetClass' => ApplAuthRule::className(), 'targetAttribute' => ['rule_name' => 'name']],
            [['fk_app_list'], 'exist', 'skipOnError' => true, 'targetClass' => ApplList::className(), 'targetAttribute' => ['fk_app_list' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Name'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'rule_name' => Yii::t('app', 'Rule Name'),
            'data' => Yii::t('app', 'Data'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'fk_app_list' => Yii::t('app', 'Fk App List'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthAssignments()
    {
        return $this->hasMany(ApplAuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(ApplAuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkAppList()
    {
        return $this->hasOne(ApplList::className(), ['id' => 'fk_app_list']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthItemChildren()
    {
        return $this->hasMany(ApplAuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthItemChildren0()
    {
        return $this->hasMany(ApplAuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(ApplAuthItem::className(), ['name' => 'child'])->viaTable('{{%appl_auth_item_child}}', ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParents()
    {
        return $this->hasMany(ApplAuthItem::className(), ['name' => 'parent'])->viaTable('{{%appl_auth_item_child}}', ['child' => 'name']);
    }
    
    public function beforeSave($insert) 
    {
        if ($this->isNewRecord) {
            $this->created_at = date("Y/m/d H:i:s");
        } else {
            $this->updated_at = time();
        }
        if(empty($this->rule_name)) {
            $this->rule_name = null;
        }
        return parent::beforeSave($insert);
    }
}
