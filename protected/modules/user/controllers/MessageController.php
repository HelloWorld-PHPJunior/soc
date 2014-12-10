<?php
class MessageController extends UserAreaController
{
    public function actionIndex()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        $messages = $user->receivedMessages;


        //var_dump(Yii::app()->user->id);


        $this->render('index',[
            'messages'=>$messages
        ]);
    }


}
