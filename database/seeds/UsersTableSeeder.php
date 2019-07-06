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
            'name' => 'Célien Boillat',
            'email' => 'celien@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Raffaella Gigante',
            'email' => 'raffaella@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Marcel Pociot',
            'email' => 'marcel@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Adam Wathan',
            'email' => 'adam@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Steve Schoger',
            'email' => 'steve@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Jeffrey Way',
            'email' => 'jeffrey@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Alex Garrett',
            'email' => 'alex@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Freek van der Herten',
            'email' => 'freek@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'David Hemphill',
            'email' => 'david@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Christoph Rumpel',
            'email' => 'christoph@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Katerina Limpitsouni',
            'email' => 'katerina@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Matt Stauffer',
            'email' => 'matt@example.com',
            'password' => Hash::make('password')
        ]);

        factory(User::class)->create([
            'name' => 'Micheal Dyrynda',
            'email' => 'micheal@example.com',
            'password' => Hash::make('password')
        ]);
    }
}
