<?php

use yii\db\Migration;

/**
 * Class m240123_153314_subsections
 */
class m240123_153213_subsections extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subsections', [
            'id' => $this->primaryKey(),
            'name' => $this ->string(100) ->notNull(),
            'sections_id' => $this->integer()->notNull()
        ]);
        $this->addForeignKey(
            'subsections_to_section_fk',
            'subsections',
            'sections_id',
            'sections',
            'id',
            'CASCADE',
            'CASCADE'

        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('subsections');
        echo 'Удалено';
    }
}