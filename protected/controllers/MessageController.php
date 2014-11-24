<?php
class MessageController extends Controller
{
    public function actionHistory(){
        $this-> render('history',['message'=>'hello']);
    }
}