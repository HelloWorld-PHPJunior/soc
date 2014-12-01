<?php
/**
 * Created by PhpStorm.
 * User: nocomments
 * Date: 26.11.14
 * Time: 21:59
 */

class UserAreaController extends Controller
{
    public function init()
    {
        if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->createUrl('user/signin'));
        }
    }
} 