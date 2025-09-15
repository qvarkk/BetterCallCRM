<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Deal;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Status::create([ 'status' => 'Created' ]);
        Status::create([ 'status' => 'In Process' ]);
        Status::create([ 'status' => 'Completed' ]);

        Employee::factory(5)->create();
        $products = Product::factory(20)->create();
        $deals = Deal::factory(5)->create();

        $deals->each(function ($deal) use ($products) {
            $deal->products()->attach(
                $products->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
