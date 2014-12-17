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
        if (Yii::app()->user->getRole() != User::ROLE_USER) {
            throw new CHttpException(403, 'У вас нет прав');
        }

        return parent::beforeControllerAction($controller, $action);
    }
}