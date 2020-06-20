<?php

use App\Entities\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class InitProyectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@queo.com',
            'password' => bcrypt('12345678'),

        ]);

        $roles = [
            'admin',
            'employee',
        ];
        
        foreach ($roles as $rol) {
            Role::create(['guard_name' => 'api', 'name' => $rol]);
        }

        $user = User::where('email', 'admin@queo.com')->first();
        $user->assignRole('admin');
    }
}
