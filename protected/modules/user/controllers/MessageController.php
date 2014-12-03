<?php
class MessageController extends UserAreaController
{
    public function actionHistory()
    {
        $this-> render('history',['message'=>'Привет Свет Как у тебя успехи?']);
    }
}

