<?php

class BaseAdminController extends UserAreaController
{
    public $layout = '//layouts/default';
    public function init()
    {
        parent::init();

        if (Yii::app()->user->getRole()!=User::ROLE_ADMIN) {
            throw new CHttpException(403, 'У вас нет прав');
        }
    }
}




