<?php

use yii\db\Migration;

/**
 * Class m240123_153213_sections
 */
class m240123_153130_sections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sections', [
            'id' => $this->primaryKey(),
            'name' => $this ->string(100) ->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('sections');
        echo 'Удалено';
    }

}