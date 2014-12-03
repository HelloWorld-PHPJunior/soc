<?php

class m141203_200938_user_role extends CDbMigration
{

	public function safeUp()
	{
        $this->execute("ALTER TABLE `user` ADD role ENUM('user','admin') DEFAULT 'user' NULL;");
	}

	public function safeDown()
	{
        $this->execute("ALTER TABLE `user` DROP COLUMN role");
	}

}