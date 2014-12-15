<?php
class ProfileController extends UserAreaController
{
    public function actionEdit()
    {
        if(Yii::app()->request->isPostRequest) {
            $this->user->setScenario('update');
            $this->user->attributes = $_POST['User'];
            if ($this->user->save()) {

            } else {
                var_dump($this->user->getErrors());
            }
        }
        $this->render('profile', [
           'user' => $this->user
        ]);
    }

}

