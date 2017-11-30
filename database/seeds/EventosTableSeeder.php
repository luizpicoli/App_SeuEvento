<?php

use Illuminate\Database\Seeder;

class EventosTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('eventos')->insert([
            'nome' => 'Festa anos 80',
            'local' => 'Clube Diamantinos',
            'atracao' => 'Banda Chimarruts',
            'data' => '21/11/2017',
            'detalhes' => 'Festa para todas as idades',
            'preco' => '50.00',
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

}
