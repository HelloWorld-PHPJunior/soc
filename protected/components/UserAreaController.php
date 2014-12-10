<?php
/**
 * Created by PhpStorm.
 * User: nocomments
 * Date: 26.11.14
 * Time: 21:59
 */

class UserAreaController extends Controller
{
    /**
     * @var User
     */
    public $user;

    public function init()
    {
        parent::init();

        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->createUrl('auth/signin'));
        }

        $this->user = Yii::app()->user->getModel();
    }
} 