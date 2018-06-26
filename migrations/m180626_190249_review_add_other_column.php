<?php

use app\models\Reviews;
use yii\db\Migration;

/**
 * Class m180626_190249_review_add_other_column
 */
class m180626_190249_review_add_other_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn(Reviews::tableName(),'bar_column', $this->string());

	}

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		$this->dropColumn(Reviews::tableName(), 'bar_column');

		return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_190249_review_add_other_column cannot be reverted.\n";

        return false;
    }
    */
}
