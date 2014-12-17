<?php
class ProfileController extends UserAreaController
{
    public function actionEdit()
    {
        if(Yii::app()->request->isPostRequest) {
            $this->user->setScenario('update');
            $this->user->attributes = $_POST['User'];
            $icon = CUploadedFile::getInstance($this->user,'icon');

            if (!empty($icon)) {
                $iconFileName = 'user_pic_' . $this->user->id . '.' . $icon->getExtensionName();
                $this->user->icon = $iconFileName;
                $this->user->setScenario('hasIcon');
            }

            if ($this->user->save()) {

                if (!empty($icon)) {
                    $icon->saveAs(Yii::getPathOfAlias('webroot').'/upload/user/' . $iconFileName);
                }

                $this->user->refresh();

            } else {
                var_dump($this->user->getErrors());
            }
        }
        $this->render('profile', [
           'user' => $this->user
        ]);
    }
}

