<?php

namespace app\models;

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
 * @property string $task_end
 * @property int $active
 */
class TaskEvolution extends \yii\db\ActiveRecord
{
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
            [['user_id', 'task_type', 'active'], 'integer'],
            [['title', 'route', 'active'], 'required'],
            [['description'], 'string'],
            [['task_start', 'task_end'], 'safe'],
            [['title', 'route'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('task', 'ID'),
            'user_id' => Yii::t('task', 'User ID'),
            'title' => Yii::t('task', 'Title'),
            'description' => Yii::t('task', 'Description'),
            'route' => Yii::t('task', 'Route'),
            'task_type' => Yii::t('task', 'Task Type'),
            'task_start' => Yii::t('task', 'Task Start'),
            'task_end' => Yii::t('task', 'Task End'),
            'active' => Yii::t('task', 'Active'),
        ];
    }
}
