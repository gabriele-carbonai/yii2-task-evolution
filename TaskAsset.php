<?php
namespace gomonkey\taskevolution;

use yii\web\View;
use kartik\base\AssetBundle;

class TaskAsset extends AssetBundle
{
	 /**
     * @inheritdoc
     */
    public $jsOptions = ['position' => View::POS_HEAD];

    /**
     * @inheritdoc
     */
    public $depends = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
	    $this->depends = array_merge($this->depends, [            
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapPluginAsset'
        ]);
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/task']);
        $this->setupAssets('js', ['js/task']);
        parent::init();
    }
}
