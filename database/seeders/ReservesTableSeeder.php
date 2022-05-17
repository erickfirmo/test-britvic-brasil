<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;
use App\Models\Vehicle;
use App\Models\Customer;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reserves = \App\Models\Reserve::factory(10)->make();
        $vehicles = Vehicle::all();
        $customers = Customer::all();

        foreach($reserves as $reserve) {
            $reserve->vehicle_id = $vehicles->randomly()->id;
            $reserve->customer_id = $customers->random()->id;
            $reserve->save();
        }
    }
}
