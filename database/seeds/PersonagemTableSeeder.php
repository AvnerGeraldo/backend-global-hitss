<?php

use Illuminate\Database\Seeder;

class PersonagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $armaHumano = (DB::table('arma')->where('nome', 'Espada Longa')->first());
        $armaOrc = (DB::table('arma')->where('nome', 'Clava de Madeira')->first());
        
        if (!empty($armaHumano->id) && !empty($armaOrc->id)) {
            DB::table('personagem')->insert([
                'nome' => 'orc',
                'vida' => 20,
                'forca' => 2,
                'agilidade' => 0,
                'dado' => 8,
                'id_arma' => $armaOrc->id,
                'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_at' => (new DateTime())->format('Y-m-d H:i:s')
            ]);

            DB::table('personagem')->insert([
                'nome' => 'humano',
                'vida' => 12,
                'forca' => 1,
                'agilidade' => 2,
                'dado' => 6,
                'id_arma' => $armaHumano->id,
                'created_at' => (new DateTime())->format('Y-m-d H:i:s'),
                'updated_at' => (new DateTime())->format('Y-m-d H:i:s')
            ]);
        }
    }
}
