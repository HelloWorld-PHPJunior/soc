<?php


class User extends CActiveRecord
{

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';

	public function tableName()
	{
		return 'user';
	}

	public function rules()
	{

		return array(
			array('first_name, last_name, password, email, gender, birthdate, created_at', 'required', 'on' => 'create'),
			array('first_name, last_name, email, gender, birthdate', 'required', 'on' => 'update'),
			array('first_name, last_name', 'length', 'max'=>300),
			array('nickname', 'length', 'max'=>250),
			array('password', 'length', 'max'=>32),
			array('email', 'length', 'max'=>255),
			array('phone', 'length', 'max'=>16),
			array('address', 'length', 'max'=>500),
			array('gender', 'length', 'max'=>1),
			array('last_login_from', 'length', 'max'=>15),
			array('about, last_login_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, nickname, password, email, phone, address, gender, birthdate, about, created_at, last_login_at, last_login_from', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sentMessages' => array(self::HAS_MANY, 'Message', 'user_from_id'),
			'receivedMessages' => array(self::HAS_MANY, 'Message', 'user_to_id'),
//			'userFriends' => array(self::HAS_MANY, 'UserFriend', 'user_from_id'),
//			'userFriends1' => array(self::HAS_MANY, 'UserFriend', 'user_to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'nickname' => 'Nickname',
			'password' => 'Password',
			'email' => 'Email',
			'phone' => 'Phone',
			'address' => 'Address',
			'gender' => 'Gender',
			'birthdate' => 'Birthdate',
			'about' => 'About',
			'created_at' => 'Created At',
			'last_login_at' => 'Last Login At',
			'last_login_from' => 'Last Login From',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_login_at',$this->last_login_at,true);
		$criteria->compare('last_login_from',$this->last_login_from,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getMessages()
    {
        return $this->receivedMessages + $this->sentMessages;
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
