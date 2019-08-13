<?php

use yii\db\Migration;

/**
 * Class m190808_092731_extend_status_table_for_created_by
 */
class m190808_092731_extend_status_table_for_created_by extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190808_092731_extend_status_table_for_created_by cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190808_092731_extend_status_table_for_created_by cannot be reverted.\n";

        return false;
    }
    */
}
