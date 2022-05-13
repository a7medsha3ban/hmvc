<?php
namespace Suppliers\database\seeders;

use Suppliers\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create(['name'=>'Ahmed','email' => 'supplier@supplier.com', 'password' => bcrypt(123456789)]);
    }
}
