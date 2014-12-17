<?php
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 26.11.14
 * Time: 22:17
 */
class WallController extends UserAreaController
{

    public function actionIndex()
    {
        $this->render('index');
    }
}