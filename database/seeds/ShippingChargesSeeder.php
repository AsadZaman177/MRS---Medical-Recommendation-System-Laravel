<?php

use App\ShippingCharges;
use Illuminate\Database\Seeder;

class ShippingChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingCharges::create([
            'name'=>'Shipping Charges',
            'price'=>'200'
        ]);
    }
}
