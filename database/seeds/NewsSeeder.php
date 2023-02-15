<?php

use App\News;
use Illuminate\Database\Seeder;
Use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
               'title'=>'Demo News 1',
               'slug'=> Str::slug('Demo News 1'),
               'featured_image'=>'1.jpg',
               'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
               'created_by' => '1'
            ], 
            [
                'title'=>'Demo News 2',
                'slug'=> Str::slug('Demo News 2'),
                'featured_image'=>'1.jpg',
                'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'created_by' => '1'
             ], 

        ];
        foreach ($news as $key => $value) {
            News::create($value);
        }
    }
}
