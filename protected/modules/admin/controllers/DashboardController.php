<?php

class DashboardController extends Controller
{
	public function actionIndex()
	{
        $this->render('index');


        array(
            'components'=>array(
                'urlManager'=>array(
                   'urlFormat'=>'path',
                ),
            ),
        );
        echo (1);
        exit;
	}
}