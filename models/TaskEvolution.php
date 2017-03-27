<?php

namespace gomonkey\taskevolution\models;

use Yii;

/**
 * This is the model class for table "task_evolution".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $route
 * @property int $task_type
 * @property string $task_start
 * @property string $deadline
 * @property int $active
 */
class TaskEvolution extends \yii\db\ActiveRecord
{
	
	public function behaviors()
	{
	    return [
	        'sortable' => [
	            'class' => \kotchuprik\sortable\behaviors\Sortable::className(),
	            'query' => self::find(),
	        ],
	    ];
	}
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_evolution';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'task_type', 'completed'], 'integer'],
            [['title', 'route', 'completed'], 'required'],
            [['description'], 'string'],
            [['task_start', 'deadline', 'order'], 'safe'],
            [['title', 'route'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'route' => Yii::t('app', 'Route'),
            'task_type' => Yii::t('app', 'Task Type'),
            'task_start' => Yii::t('app', 'Task Start'),
            'deadline' => Yii::t('app', 'Deadline'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
