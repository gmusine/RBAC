<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%appl_list}}".
 *
 * @property int $id
 * @property string $app_name application name
 * @property string $description details of the application
 * @property string $dev_framework Development framework used
 * @property string $owner request owner/study owner
 * @property string $url application location
 * @property int $fk_study the dependant study
 * @property string $date_created date record created
 * @property string $date_modified
 * @property resource $feature_image image used on application feature
 * @property int $status 1= active , 0=inactive
 *
 * @property ApplAuthAssignment[] $applAuthAssignments
 * @property ApplAuthItem[] $applAuthItems
 */
class ApplList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%appl_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_name'], 'required'],
            [['description', 'feature_image'], 'string'],
            [['fk_study', 'status'], 'integer'],
            [['date_created', 'date_modified'], 'safe'],
            [['app_name', 'url'], 'string', 'max' => 50],
            [['dev_framework'], 'string', 'max' => 25],
            [['owner'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_name' => 'App Name',
            'description' => 'Description',
            'dev_framework' => 'Dev Framework',
            'owner' => 'Owner',
            'url' => 'Url',
            'fk_study' => 'Fk Study',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'feature_image' => 'Feature Image',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthAssignments()
    {
        return $this->hasMany(ApplAuthAssignment::className(), ['fk_app_list' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplAuthItems()
    {
        return $this->hasMany(ApplAuthItem::className(), ['fk_app_list' => 'id']);
    }
    public function beforeSave($insert) 
    {
        if($this->isNewRecord)
        {
            $this->date_created = Date("Y/m/d");
        }
        else
        {
            $this->date_modified = date("Y/m/d");
        }
        if (empty($this->fk_study))
        {
            $this->fk_study = null; 
        }
    return parent::beforeSave($insert);
   
    }
}
