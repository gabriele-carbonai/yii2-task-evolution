<?php

namespace gomonkey\taskevolution\controllers;

use yii;
use yii\web\Response;
use yii\base\Security;
use yii\db\ActiveQuery;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\BadRequestHttpException;
use gomonkey\taskevolution\models\TaskEvolution;

/**
 * Default controller for the `gomonkey` module
 */
class DefaultController extends Controller
{
	/** @var ActiveQuery */
    public $query;
    
    /** @var string */
    public $orderAttribute = 'order';
    
	public function actions()
	{
	    return [
	        'sorting' => [
	            'class' => \kotchuprik\sortable\actions\Sorting::className(),
	            'query' => \gomonkey\taskevolution\models\TaskEvolution::find(),
	        ],
	    ];
	}
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionCreate()
    {
        $model = new TaskEvolution();
	    
	    $request = \Yii::$app->getRequest(); 
	    if ($request->isPost && $model->load($request->post())) {
	        \Yii::$app->response->format = Response::FORMAT_JSON;
	        if( !Yii::$app->user->isGuest ){
		        $model->user_id = Yii::$app->user->id;
	        }
	       $model->completed = 0;
	        
	       return ['success' => $model->save()];
	    }
	    

    }
    
    public function actionView($id){
	    return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionChangestatus(){
	    
	    \Yii::$app->db->createCommand("UPDATE task_evolution SET completed = CASE WHEN completed = 0 THEN 1 ELSE 0 END WHERE id=:id")
		->bindValue(':id', Yii::$app->request->post('id'))
		->execute();
	    
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
        
    protected function findModel($id)
    {
        if (($model = TaskEvolution::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
