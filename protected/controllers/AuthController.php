<?php

class AuthController extends Controller
{

	public $layout='//layouts/default';


	public function actionSignin()
    {

        var_dump(sha1('123'));

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
        $user = new User('search');

        if(isset($_POST[ 'User' ])){
            $user->attributes = $_POST[ 'User' ];

            if ($user->save()){
            }
        }


        $this->render('signup', [
            'user' => $user
        ]);
    }

    public function actionSignout()
    {

    }
}
