<?php

class m141203_193713_dummy_user extends CDbMigration
{
	public function safeUp()
	{
        $this->execute("INSERT INTO `user` (id, first_name, last_name, nickname, password, email, phone, address, gender, birthdate, about, created_at, last_login_at, last_login_from) VALUES (1, 'Artem', 'Kolotin', 'NoComments', '', 'artemka1311@gmail.com', null, null, 'M', '1991-11-19', null, NOW(), null, null)");
        $this->execute("INSERT INTO user_auth (id, user_id, login, pass, provider) VALUES (1, 1, 'artemka1311@mail.ru', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '')");
	}

	public function safeDown()
	{
        $this->execute("DELETE FROM `user` WHERE id=1");
	}

}