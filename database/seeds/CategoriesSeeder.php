<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->delete();
        Schema::enableForeignKeyConstraints();

        $categories = [
            ['id'=>1,'title_ru'=>'КИНОТЕАТР','title_tk'=>'KINOTEATR'],
            ['id'=>2,'title_ru'=>'ТЕАТР','title_tk'=>'TEATR'],
            ['id'=>3,'title_ru'=>'КОНЦЕРТ','title_tk'=>'AÝDYM SAZ'],
            ['id'=>4,'title_ru'=>'РАЗВЛЕЧЕНИЯ','title_tk'=>'ŞAGALAŇ'],
            ['id'=>5,'title_ru'=>'ДЛЯ ДЕТЕЙ','title_tk'=>'ÇAGALAR ÜÇIN'],
            ['id'=>6,'title_ru'=>'СПОРТ','title_tk'=>'SPORT'],
            ['id'=>7,'title_ru'=>'ДРУГИЕ','title_tk'=>'BEÝLEKILER'],
        ];
        DB::table('categories')->insert($categories);
    }
}
