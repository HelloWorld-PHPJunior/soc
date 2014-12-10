<?php

class Controller extends CController
{

	public $layout='//layouts/default';
    public $assetsPath;
    public function init()
    {
        parent::init();

        $this->assetsPath = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.assets'));

    }
}

