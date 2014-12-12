<?php

class m141212_203249_user_del_col extends CDbMigration
{
	public function safeUp()
	{
        $this->execute('ALTER TABLE `user` DROP COLUMN password;');
    }

	public function safeDown()
	{
        $this->execute('ALTER TABLE `user` ADD COLUMN `password` VARCHAR(32) NOT NULL;');
    }
}