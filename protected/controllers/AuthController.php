<?php

class AuthController extends Controller
{

	public $layout='//layouts/default';


	public function actionSignin()
    {

        if (Yii::app()->request->isPostRequest) {
            $identity = new UserIdentity($_POST['login'], $_POST['pass']);

            if ($identity->authenticate()) {
                Yii::app()->user->login($identity);
                $this->redirect(Yii::app()->createUrl(''));
            } else {
                echo $identity->errorMessage;
            }
        }

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
