<?php


namespace gomonkey\taskevolution;

use Yii;
use yii\base\Widget;
use yii\web\Request;
use  gomonkey\taskevolution\Translation;

class Task extends Widget
{
	use Translation;
   
    public $ipAddress = ['127.0.0.1', '::1'];
    
    public $users = false;
	
	public $active = true;

    /**
     * @inheritdoc
     */
    public function run()
    {  
		
		
	    if( $this->active === true &&  in_array(Yii::$app->getRequest()->getUserIP(),  $this->ipAddress) ){ 
		  
			    if( $this->users === false || ( $this->users === true && !Yii::$app->user->isGuest )  ){
				     
				    $this->initI18N(__DIR__, 'task');
				    $this->initOptions();
			        $this->registerAssets();
			        
			        return $this->render('task');
	        }
        }
    }

    /**
     * Initialize the dialog buttons.
     */
    public function initOptions()
    {
        
    }

    /**
     * Registers the client assets for [[Dialog]] widget.
     */
    public function registerAssets()
    {
	    $view = $this->getView();
		TaskAsset::register($view);
	    
	     
    }
}
