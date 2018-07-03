<?php

use yii\db\Migration;

/**
 * Class m180703_152327_table_user
 */
class m180703_152327_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
		$this->execute('CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) CHARACTER SET utf8 NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `access_token` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `access_token_UNIQUE` (`access_token`);


ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
		$this->dropTable('user');
    }
}
