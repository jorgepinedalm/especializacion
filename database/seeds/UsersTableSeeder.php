<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Residente;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@esp.com';
        $user->password = Hash::make('admin@12345');
        $user->save();

        $user->roles()->attach(Role::where('name', 'admin')->first());

        $user = new User();
        $user->name = 'Usuario residente';
        $user->email = 'residente@esp.com';
        $user->password = Hash::make('residente@12345');
        $user->save();

        $user->roles()->attach(Role::where('name', 'residente')->first());

        $r = new Residente();
        $r->nombre ="Juan";
        $r->apellido = "Perez";
        $r->user_id = $user->id;
        $r->tipo_documento_id = 1;
        $r->numero_documento = "1234567890";
        $r->email = 'residente@esp.com';
        $r->estado = true;

        $r->save();
        
    }
}
