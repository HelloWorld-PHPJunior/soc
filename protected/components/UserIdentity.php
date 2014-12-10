<?php
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $auth = UserAuth::model()->findByAttributes([
            'login'=>$this->username,
            'pass' => sha1($this->password)
        ]);

        if ($auth === null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;

        } elseif ($auth->pass !== sha1($this->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;

        } else {
            $this->_id = $auth->user_id;
            $this->setState('title',  $auth->user->nickname);
            $this->errorCode=self::ERROR_NONE;
        }

        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }


}

