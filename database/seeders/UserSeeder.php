<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Create 25 users with the 'moderator' role and associated employee records
        for ($i = 0; $i < 25; $i++) {
            $user = User::create([
                'name' =>  $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('Def@uLt123'),
                'role' => 'moderator',  // Assign 'moderator' role
            ]);

            // Create the associated employee record for each user
            Employee::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'phone_number' => $faker->phoneNumber,
                'id_card_address' => $faker->address,
                'marital_status' => $faker->randomElement(['single', 'married']),
                'gender' => $faker->randomElement(['male', 'female']),
                'birth_date' => $faker->date(),
                'birth_place' => $faker->city,
                'firstname' => $user->name,  // Use the user's name for the firstname
                'employee_no' => 'EMP-' . $faker->unique()->numerify('#####'),
                'company_id' => 14,  // Assuming company_id is fixed as 1
            ]);
        }

        // Create 25 users without any role and associated employee records
        for ($i = 0; $i < 25; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('Def@uLt123'),
                'role' => null,  // No role for these users
            ]);

            // Create the associated employee record for each user
            Employee::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'phone_number' => $faker->phoneNumber,
                'id_card_address' => $faker->address,
                'marital_status' => $faker->randomElement(['single', 'married']),
                'gender' => $faker->randomElement(['male', 'female']),
                'birth_date' => $faker->date(),
                'birth_place' => $faker->city,
                'firstname' => $user->name,  // Use the user's name for the firstname
                'employee_no' => 'EMP-' . $faker->unique()->numerify('#####'),
                'company_id' => 14,  // Assuming company_id is fixed as 1
            ]);
        }
    }
}