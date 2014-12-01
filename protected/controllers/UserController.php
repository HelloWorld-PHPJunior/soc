<?php

class UserController extends Controller
{

	public $layout='//layouts/default';


	public function actionSignin()
    {

    }

    public function actionSignup()
    {
        $this->render('signup');
    }

    public function actionSignout()
    {

    }
}
