<?php
namespace Admins\database\seeders;

use Admins\Models\Admin;
use Illuminate\Database\Seeder;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['email' => 'admin@admin.com', 'password' => bcrypt(123456789)]);
    }
}
