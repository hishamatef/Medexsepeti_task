<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        $users = [
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti1.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti2.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti3.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti4.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Medexsepti Admin',
                'email' => 'admin@medexsepti5.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'last_visited_product' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];
        DB::table('users')->insert($users);
        $user = User::where('email', 'admin@medexsepti.com')->first();
        $user->assignRole('Admin');
    }
}
