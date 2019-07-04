<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Célien',
            'email' => 'celien@pixlforge.ch',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Raffaella',
            'email' => 'raffaella@pixlforge.ch',
            'password' => Hash::make('password')
        ]);
    }
}
