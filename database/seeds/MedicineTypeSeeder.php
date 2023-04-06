<?php

use App\MedicineType;
use Illuminate\Database\Seeder;

class MedicineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicineType::create( [
        'id'=>1,
        'type'=>'Tablet',
        'created_at'=>'2023-03-01 11:26:33',
        'updated_at'=>'2023-03-01 11:26:33'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>2,
        'type'=>'Syrup',
        'created_at'=>'2023-03-01 11:26:42',
        'updated_at'=>'2023-03-01 11:26:42'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>3,
        'type'=>'Injections',
        'created_at'=>'2023-03-01 11:27:14',
        'updated_at'=>'2023-03-01 11:27:14'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>4,
        'type'=>'Capsules',
        'created_at'=>'2023-03-01 11:27:23',
        'updated_at'=>'2023-03-01 11:27:23'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>5,
        'type'=>'Drops',
        'created_at'=>'2023-03-01 11:27:46',
        'updated_at'=>'2023-03-01 11:27:46'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>6,
        'type'=>'Inhalers',
        'created_at'=>'2023-03-01 11:27:57',
        'updated_at'=>'2023-03-01 11:27:57'
        ] );
        
        
                    
        MedicineType::create( [
        'id'=>7,
        'type'=>'Creams/Lotions',
        'created_at'=>'2023-03-02 12:08:53',
        'updated_at'=>'2023-03-02 12:08:53'
        ] );
    }
}
