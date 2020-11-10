<?php
use Migrations\AbstractMigration;

class AddColumnsToBidinfo extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('bidinfo');
        $table->addColumn('bidder_name', 'string', [
            'default' => null,
            'limit' => 100,
            'null' => true,
            'after' => 'price',
        ]);
        $table->addColumn('bidder_address', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
            'after' => 'bidder_name',
        ]);
        $table->addColumn('bidder_phone_number', 'string', [
            'default' => null,
            'limit' => 13,
            'null' => true,
            'after' => 'bidder_address',
        ]);
        $table->addColumn('trading_status', 'string', [
            'default' => 0,
            'limit' => 1,
            'null' => false,
            'after' => 'bidder_phone_number',
        ]);
        $table->addColumn('modified', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
            'after' => 'created',
        ]);
        $table->update();
    }
}
