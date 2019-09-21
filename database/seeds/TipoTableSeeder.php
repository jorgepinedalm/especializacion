<?php

use Illuminate\Database\Seeder;

use App\Tipo_Documento;

class TipoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = new Tipo_Documento();
        $tipo->nombre = "Cédula de ciudadania";
        $tipo->abbr = "CC";
        $tipo->estado = true;
        $tipo->save();

        $tipo = new Tipo_Documento();
        $tipo->nombre = "Cédula de extranjeria";
        $tipo->abbr = "CE";
        $tipo->estado = true;
        $tipo->save();

        $tipo = new Tipo_Documento();
        $tipo->nombre = "Pasaporte";
        $tipo->abbr = "PAS";
        $tipo->estado = true;
        $tipo->save();

    }
}
