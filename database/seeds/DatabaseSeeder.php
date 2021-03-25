<?php

use App\Models\ProductAttributeModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(AttributeTableSeeder::class);
        $this->call(ProductAttributeTableSeeder::class);




    }
}
