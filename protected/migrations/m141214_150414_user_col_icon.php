<?php

class m141214_150414_user_col_icon extends CDbMigration
{
	public function safeUp()
	{
        $this->execute("ALTER TABLE `user` ADD icon VARCHAR(255)");
	}

	public function safeDown()
	{
        $this->execute("ALTER TABLE `user` DROP COLUMN icon");
    }
}