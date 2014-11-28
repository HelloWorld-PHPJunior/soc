<?php

class UserController extends Controller
{

	public $layout='//layouts/default';


	public function actionSignin()
    {
        $this->render('signin');
    }

    public function actionSignup()
    {
        $this->render('signup');
    }

    public function actionSignout()
    {

    }
}
