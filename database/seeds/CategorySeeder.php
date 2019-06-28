<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'cat_name'=>'Mobile devvelpment',
            'cat_name_kh'=>'ម៉ូបាល់ឌិវើឡុបមិន',
            'order'=>'3',
            'cat_description'=>'this category for web programming'
        ]);
        Category::create([
            'cat_name'=>'web devvelpment',
            'cat_name_kh'=>'វេបឌិវើឡុបមិន',
            'order'=>'3',
            'cat_description'=>'this category for web programming'
        ]);
        Category::create([
            'cat_name'=>'linux',
            'cat_name_kh'=>'លីនុច',
            'order'=>'2',
            'cat_description'=>'this category for linux tips'
        ]);
    }
}
