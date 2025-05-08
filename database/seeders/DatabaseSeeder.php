<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
        ]);

        //$this->call(UsersTableSeeder::class);
        $this->call(JhonatanPermissionInfoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(DepartamentosSeeder::class);
        //$this->call(PlanadquieresSeeder::class);
        $this->call(EquipoSeeder::class);
        $this->call(tPlanSeeder::class);
        $this->call(TPagoSeeder::class);
    }
}
