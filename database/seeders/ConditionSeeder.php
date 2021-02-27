<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condition::create([
            'name' => 'Nuevo',
            'description' => 'Un artículo nuevo, sin usar, sin abrir, sin desperfectos y en el paquete original.',
        ]);
        Condition::create([
            'name' => 'Abierto sin usar',
            'description' => 'Un artículo nuevo, en estado excelente, que no muestra signos de uso o desgaste. El artículo puede estar sin empaquetar o sin el envoltorio original, o bien empaquetado pero sin precintar.',
        ]);
        Condition::create([
            'name' => 'Usado',
            'description' => 'Un artículo que se ha usado con anterioridad. El artículo puede mostrar un deterioro superficial, pero funciona perfectamente.',
        ]);
    }
}
