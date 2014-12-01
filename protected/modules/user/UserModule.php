<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 26.11.14
 * Time: 22:40
 */
class UserModule extends CWebModule
{
    public function init () {
        $this->setImport(array(
            'user.models.*',
            'user.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if(parent::beforeControllerAction($controller, $action))
        {
            return true;
        }
        else
            return false;
    }
}