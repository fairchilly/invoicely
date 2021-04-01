<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\Fee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Company::factory(10)->create();
        Customer::factory(10)->create();
        Invoice::factory(10)->create();
        Item::factory(40)->create();
        Fee::factory(20)->create();
    }
}
