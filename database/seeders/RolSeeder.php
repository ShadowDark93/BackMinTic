<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adm = new Rol();
        $adm->description = 'Administrador';
        $adm->save();

        $comp = new Rol();
        $comp->description = 'Administrador';
        $comp->save();

        $ven = new Rol();
        $ven->description = 'Vendedor';
        $ven->save();

   }
}