<?php

namespace app\models;
use yii\helpers\ArrayHelper;

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
    
    public $children;
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
            [['type', 'fk_app_list'], 'integer'],
            [['description', 'data', 'updated_at', 'created_at'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64],
            [['children', 'updated_at', 'created_at'], 'safe'],
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
        if ($this->isNewRecord) 
            {
            $this->created_at = date("Y-m-d H:i:s");
            }
        else {
            $this->updated_at = date("Y-m-d H:i:s");
        }
        if(empty($this->rule_name)) {
            $this->rule_name = null;
        }
        return parent::beforeSave($insert);
    }
    
    public static function getChildList($exist, $id = null, $app_id = 6)
    {
        $list = [];
        $data = ApplAuthItem::findAll(['fk_app_list' => $app_id]);
        //$list = ArrayHelper::map($data, 'name', 'name');
        foreach ($data as $record) {
            $list[$record->name] = $record->name;
        }
        if($id !== null) {
            if(($found = array_search($id, $list)) !== false) {
                unset($list[$found]);
            }
        }
        return $list;
    }
    public function afterSave($insert, $changedAttributes)  
    {
        ApplAuthItemChild::updateChildren($this->name, $this->children);
        return parent::afterSave($insert, $changedAttributes);
    }
    
    public function afterFind() {
        $children = ApplAuthItemChild::findAll(['parent' => $this->name]);
        $this->children = \yii\helpers\ArrayHelper::map($children, 'child', 'child');
        
        return parent::afterFind();
    }
    
    public function addChildren($list)
    {
        if(is_array($list)) {
            foreach ($list as $item) { //for($i = 0; $i< count($list); $i++) {
                if (($model = ApplAuthItemChild::find()->where(['parent' => $this->name, 'child' => $item])->one()) === null) {
                    $model =  new ApplAuthItemChild(['parent' => $this->name, 'child' => $item]);
                    $model->save();
                }
            }
        }
    }
    
    public function removeChildren($list)
    {
        if(is_array($list)) {
            foreach ($list as $item) { //for($i = 0; $i< count($list); $i++) {
                if (($model = ApplAuthItemChild::find()->where(['parent' => $this->name, 'child' => $item])->one()) !== null) {
                    $model->delete();
                }
            }
        }
    }
  
}
