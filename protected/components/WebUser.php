<?php

class WebUser extends CWebUser
{
    private $_model = null;

    function getRole()
    {
        if ($user = $this->getModel()){

            return $user->role;
        }
    }

    public function getModel()
    {
        if (!$this->isGuest && $this->_model === null){
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }

        return $this->_model;
    }
}