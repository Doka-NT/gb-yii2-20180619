<?php

use yii\db\Migration;

/**
 * Class m180703_152548_table_note
 */
class m180703_152548_table_note extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
	{
		$this->execute('CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `creator` int(11) NOT NULL,
  `date_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evrnt_note_1_idx` (`creator`);

ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;');
    }

    public function down()
    {
		$this->dropTable('note');
    }

}
