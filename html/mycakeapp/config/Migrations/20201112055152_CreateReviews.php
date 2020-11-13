<?php
use Migrations\AbstractMigration;

class CreateReviews extends AbstractMigration
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
        $table = $this->table('reviews');
        $table->addColumn('reviewer_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('reviewee_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('bidinfo_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('rate', 'integer', [
            'default' => null,
            'limit' => 1,
            'null' => false,
        ]);
        $table->addColumn('comment', 'string', [
            'default' => null,
            'limit' => 1000,
            'null' => false,
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
