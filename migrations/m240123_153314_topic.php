<?php

use yii\db\Migration;

/**
 * Class m240123_152740_topic
 */
class m240123_153314_topic extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createTable('topic',[
            'id' => $this -> primaryKey(),
            'name' => $this ->string(100) ->notNull(),
            'subsection_id' => $this -> integer() -> notNull(),
            'user_id' => $this ->integer() -> notNull(),
        ]);
        $this->addForeignKey(
            'topic_to_subsection_fk',
            'topic',
            'subsection_id',
            'subsections',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'topic_to_user_fk',
            'topic',
            'user_id',
            'user',
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
        $this -> dropTable('topic');
        echo 'УДАЛЕНО';
    }

}
