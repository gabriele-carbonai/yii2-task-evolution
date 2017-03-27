<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'rowOptions' => function ($model, $key, $index, $grid) {
        return ['data-sortable-id' => $model->id];
    },
    'columns' => [
	    [
            'class' => \kotchuprik\sortable\grid\Column::className(),
        ],
        'title',
        'description',
        [
            'attribute' => 'task_start',
            'format' => ['date', 'php:d/m/Y']
        ], 
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            'buttons' => [
			    'view' => function ($url, $model, $key) {
			        return Html::a(Yii::t('app', '{icon}', ['icon' => FA::icon('eye')]) , ['#'], 
			        			['class' => 'task-view', 'data-href' =>  Yii::$app->request->baseUrl . '/taskevolution/default/view?id='.$model->id] );
			    	},
				]
        ],
        
        [
        	'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
					return ['value' => $model->completed];
				},
			'header' => 'Completed',
		],
		    
    ],
    'options' => [
        'data' => [
            'sortable-widget' => 1,
            'sortable-url' =>  Yii::$app->request->baseUrl . '/taskevolution/default/sorting',
        ]
    ],
]);