<?php

namespace Database\Seeders;

use Admins\database\seeders\AdminTableSeeder;
use Illuminate\Database\Seeder;
use Suppliers\database\seeders\SupplierTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        $this->call(SupplierTableSeeder::class);

    }
}
