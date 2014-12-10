<?php

class Message extends CActiveRecord
{

	public function tableName()
	{
		return 'message';
	}


	public function rules()
	{
		return array(
			array('user_from_id, user_to_id, body, created_at', 'required'),
			array('readed', 'numerical', 'integerOnly'=>true),
			array('user_from_id, user_to_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_from_id, user_to_id, body, readed, created_at', 'safe', 'on'=>'search'),
		);
	}


	public function relations()
	{
		return array(
			'userFrom' => array(self::BELONGS_TO, 'User', 'user_from_id'),
			'userTo' => array(self::BELONGS_TO, 'User', 'user_to_id'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_from_id' => 'User From',
			'user_to_id' => 'User To',
			'body' => 'Body',
			'readed' => 'Readed',
			'created_at' => 'Created At',
		);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_from_id',$this->user_from_id,true);
		$criteria->compare('user_to_id',$this->user_to_id,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('readed',$this->readed);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getParticipants($messages)
    {
        $participants = [];

        foreach ($messages as $message) {
            $participants[] = $message->userFrom;
            $participants[] = $message->userTo;
        }

        return array_unique($participants);
    }

}
