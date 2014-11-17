<?php

class m141117_192609_remove_message_subject extends CDbMigration
{

	public function safeUp()
	{
        $this->execute('ALTER TABLE `message` DROP COLUMN `subject`');
	}

	public function safeDown()
	{
        $this->execute('ALTER TABLE `message` ADD COLUMN `subject` varchar(300) DEFAULT NULL');
	}

}