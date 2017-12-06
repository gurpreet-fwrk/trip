<?php

use Phinx\Migration\AbstractMigration;

class I18nMessages extends AbstractMigration
{
    /**
     * Creates tables
     *
     * @return void
     */
    public function up()
    {
        $this->table('i18n_messages')
            ->addColumn('domain', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('locale', 'string', [
                'default' => null,
                'limit' => 5,
                'null' => false,
            ])
            ->addColumn('singular', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('plural', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('context', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('value_0', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('value_1', 'text', [
                'default' => null,
                'null' => false,
            ])
            ->addColumn('value_2', 'text', [
                'default' => null,
                'null' => false,
            ])
			->addIndex(['domain', 'locale'])
            ->create();
    }

    /**
     * Drops tables
     *
     * @return void
     */
    public function down()
    {
        $this->dropTable('i18n_messages');
    }
}
