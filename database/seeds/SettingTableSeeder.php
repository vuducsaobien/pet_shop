<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
                ['key_value' => 'setting-general', 'value' => '{}'],
                ['key_value' => 'setting-social', 'value' => '{}'],
                ['key_value' => 'setting-email', 'value' => '{}'],
                ['key_value' => 'setting-bcc', 'value' => '{}'],
            ]

        );
    }
}
