<?php

class m141124_203527_user_auth_table extends CDbMigration
{

	public function safeUp()
	{
        $this->execute('
          CREATE TABLE `user_auth` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `user_id` int(11) unsigned DEFAULT NULL,
              `login` VARCHAR(100),
              `pass` VARCHAR(50),
              `provider` varchar(200) NOT NULL,
              PRIMARY KEY (`id`),
              KEY `user_id` (`user_id`),
              CONSTRAINT `user_auth_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ');
	}

	public function safeDown()
	{
        $this->execute('DROP TABLE `user_auth`');
	}

}