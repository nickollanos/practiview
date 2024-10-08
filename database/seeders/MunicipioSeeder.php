<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipio = [
            'Leticia', 'Medellín', 'Bello', 'Envigado', 'Rionegro',
            'Barranquilla', 'Soledad', 'Malambo', 'Puerto Colombia',
            'Cartagena', 'Magangué', 'Turbaco', 'Tunja', 'Sogamoso',
            'Duitama', 'Manizales', 'Villamaría', 'Chinchiná',
            'Florencia', 'El Doncello', 'San Vicente del Caguán',
            'Yopal', 'Aguazul', 'Tauramena', 'Popayán', 'Santander de Quilichao',
            'El Bordo', 'Valledupar', 'Aguachica', 'La Jagua de Ibirico',
            'Quibdó', 'Istmina', 'Condoto', 'Montería', 'Lorica', 'Sahagún',
            'Bogotá', 'Soacha', 'Chocontá', 'San José del Guaviare', 'Inírida',
            'Neiva', 'Pitalito', 'La Plata', 'Riohacha', 'Maicao', 'Uribia',
            'Santa Marta', 'Ciénaga', 'El Banco', 'Villavicencio', 'Acacías',
            'Granada', 'Pasto', 'Ipiales', 'Tumaco', 'Cúcuta', 'Pamplona',
            'Ocaña', 'Mocoa', 'Puerto Asís', 'Armenia', 'Calarcá', 'Salento',
            'Pereira', 'Dosquebradas', 'Santa Rosa de Cabal', 'Sincelejo',
            'Corozal', 'Morroa', 'Ibagué', 'Espinal', 'Melgar', 'Cali',
            'Palmira', 'Buenaventura', 'Mitú', 'Puerto Carreño'
        ];

        foreach ($municipio as $nombre) {
            Municipio::create(['nombre' => $nombre]);
        }
    }
}
