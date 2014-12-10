<?php
class MessageController extends UserAreaController
{
    public function actionIndex()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);

        $this->render('history',[
            'messages' => $user->messages
        ]);
    }


}
