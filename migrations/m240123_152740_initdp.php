<?php

use yii\db\Migration;

/**
 * Class m240123_152842_initdp
 */
class m240123_152740_initdp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this -> createTable('user',[
            'id' => $this -> primaryKey(),
            'email' => $this ->string(100) ->notNull(),
            'password' => $this -> integer() -> notNull(),
            'name' => $this ->string(100) -> notNull(),
        ]);

        $this->insert('user', [
            'email' => 'adminn@admin.admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'name' => 'admin'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this -> dropTable('user');
        echo 'УДАЛЕНО';
    }

}