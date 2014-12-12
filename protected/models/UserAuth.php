<?php

class UserAuth extends CActiveRecord
{

	public function tableName()
	{
		return 'user_auth';
	}

	public function rules()
	{
		return array(
			array('provider', 'required'),
			array('user_id', 'length', 'max'=>11),
			array('login', 'length', 'max'=>100),
			array('pass', 'length', 'max'=>50),
			array('provider', 'length', 'max'=>200),
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, login, pass, provider', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'login' => 'Login',
			'pass' => 'Pass',
			'provider' => 'Provider',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('provider',$this->provider,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
