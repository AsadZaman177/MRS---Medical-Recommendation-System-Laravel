<?php

use App\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonial = [
            [
               'name'=>'Rosalina D. William',
               'company'=> 'Founder, XYZ',
               'comments'=>'Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
               'image' => '7.jpg',
            ], 
            [
                'name'=>'Jon Doe',
                'company'=> 'CEO, ABC',
                'comments'=>'Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',
                'image' => '5.jpg',
             ], 

        ];
        foreach ($testimonial as $key => $value) {
            Testimonial::create($value);
        }
    }
}
