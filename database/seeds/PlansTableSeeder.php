<?php

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Plan::class)->create([
            'name' => 'Small',
            'provider_id' => 'teams_small',
            'teams' => true,
            'teams_limit' => 2
        ]);

        factory(Plan::class)->create([
            'name' => 'Medium',
            'provider_id' => 'teams_medium',
            'teams' => true,
            'teams_limit' => 5
        ]);

        factory(Plan::class)->create([
            'name' => 'Monthly',
            'provider_id' => 'monthly',
            'teams' => false,
            'teams_limit' => false
        ]);
    }
}
