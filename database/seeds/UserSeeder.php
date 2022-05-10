<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // admin user 
        User::create([
            'name' => 'emanuele',
            'email' => 'difelice.emanuele@gmail.com',
            'password' => Hash::make('1234'),
        ]);

        // ciclo utente fake 
        for ($i=0; $i < 10; $i++) { 
            User::create([
                'name' => $faker->name(),
                'email' => $faker->unique()->email(),
                'password' => Hash::make($faker->password()),
            ]);
        }
    }
}
