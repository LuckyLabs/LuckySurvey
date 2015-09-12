<?php

use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = require_once(__DIR__.'/data.php');

        foreach($data as $table => $items)
            $this->insertMultiple($table, $items);
    }

    protected function insertMultiple($table, $items)
    {
        foreach($items as $item)
        {
            DB::table($table)->insert($item);
        }
    }
}
