<?php


namespace gomonkey\taskevolution;

use Yii;
use yii\base\Widget;


class Task extends Widget
{
   

    /**
     * @var array the configuration options for the bootstrap dialog (applicable when [[useNative]] is `false`). You can
     * set the configuration settings as key value pairs that can be recognized by the BootstrapDialog plugin.
     */
    public $options = [];

   

    /**
     * @inheritdoc
     */
    public function run()
    { 
        $this->initOptions();
        $this->registerAssets();
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
       
    }
}
