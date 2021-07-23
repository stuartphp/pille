<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lookup;

class LookupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lookup::create([
            'name'=>'orders',
            'value'=>'789'
        ]);
    }
}
