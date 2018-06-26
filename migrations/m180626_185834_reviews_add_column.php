<?php

use app\models\Reviews;
use yii\db\Migration;

/**
 * Class m180626_185834_reviews_add_column
 */
class m180626_185834_reviews_add_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->addColumn(Reviews::tableName(),'foo_column', $this->string());

		return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(Reviews::tableName(), 'foo_column');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_185834_reviews_add_column cannot be reverted.\n";

        return false;
    }
    */
}
