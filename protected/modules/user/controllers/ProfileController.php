<?php
class ProfileController extends UserAreaController
{
    public function actionEdit()
    {
        $this->render('profile', [
           'user' => $this->user
        ]);
    }
}