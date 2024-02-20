<?php

use yii\db\Migration;

/**
 * Class m240123_153130_messages
 */
class m240123_153740_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'content' => $this->string(100),
            'timestamp' => $this->timestamp()->defaultExpression('NOW()')->notNull(),
            'user_id' => $this->integer()->notNull(),
            'topic_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey(
            'messages_to_topic_fk',
            'messages',
            'topic_id',
            'topic',
            'id',
            'CASCADE',
            'CASCADE'

        );
        $this->addForeignKey(
            'messages_to_user_fk',
            'messages',
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
        $this -> dropTable('messages');
        echo 'Удалено';
    }


}