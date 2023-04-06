<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersSeeder::class);
      $this->call(CMSSeeder::class);
      $this->call(NewsSeeder::class);
      $this->call(TestimonialSeeder::class);
      $this->call(MedicineTypeSeeder::class);
      $this->call(MedicineFormulaeSeeder::class);
      $this->call(MedicineBrandSeeder::class);
      $this->call(MedicineCompanySeeder::class);
    }
}
