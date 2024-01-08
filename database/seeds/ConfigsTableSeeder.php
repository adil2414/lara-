<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Config::insert([
            ['name' => 'site_name', 'value' => 'Blog'],
            ['name' => 'site_title', 'value' => 'Blog'],
            ['name' => 'copyright_owner', 'value' => 'Blog'],
            ['name' => 'admin_email', 'value' => 'alan@gmail.com'],
        ]);
    }
}
