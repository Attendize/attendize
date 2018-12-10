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
            ['id'=>1,'title_ru'=>'РАЗВЛЕЧЕНИЯ','title_tm'=>'ŞAGALAŇ'],
            ['id'=>2,'title_ru'=>'КИНОТЕАТР','title_tm'=>'KINOTEATR'],
            ['id'=>3,'title_ru'=>'ДЛЯ ДЕТЕЙ','title_tm'=>'ÇAGALAR ÜÇIN'],
            ['id'=>4,'title_ru'=>'ТЕАТР','title_tm'=>'TEATR'],
            ['id'=>5,'title_ru'=>'КОНЦЕРТ','title_tm'=>'AÝDYM SAZ'],
            ['id'=>6,'title_ru'=>'СПОРТ','title_tm'=>'SPORT'],
            ['id'=>7,'title_ru'=>'ДРУГИЕ','title_tm'=>'BEÝLEKILER'],
        ];
        DB::table('categories')->insert($categories);
    }
}
