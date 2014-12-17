<?php

class SiteController extends Controller
{
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            $this->render('error', $error);
        }
    }
}