<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Arreglo de provincias con sus respectivas ciudades
        $provinces = [
            'AZU' => [
                'Cuenca', 'Gualaceo', 'Paute', 'Sigsig', 'Girón', 'San Fernando', 'Santa Isabel', 'Pucará', 'Nabón'
            ],
            'GAL' => [
                'Isabela', 'Santa Cruz', 'Puerto Baquerizo Moreno', 'Puerto Ayora'
            ],
            'CAN' => [
                'Cañar', 'Biblián', 'Azogue', 'La Troncal'
            ],
            'BOL' => [
                'Guaranda', 'San Miguel de Bolívar', 'Caluma', 'Chillanes', 'Echeandía', 'Chimbo', 'La Asunción', 'La Magdalena'
            ],
            'CAR' => [
                'Mira', 'Bolívar', 'Tulcán', 'El Angel', 'Huaca', 'Julio Andrade', 'La Paz', 'San Gabriel'
            ],
            'CHI' => [
                'Riobamba', 'Guano', 'Chambo', 'Colta', 'Penipe', 'Guamote', 'Pallatanga', 'Alausí', 'Chunchi', 'Cumandá', 'Cajabamba', 'Huigra', 'San Andrés', 'San Juan'
            ],
            'COT' => [
                'Saquisilí', 'Latacunga', 'Pujilí', 'Salcedo', 'Sigchos', 'La Maná', 'Chantillin', 'El Corazón', 'Guaytacama', 'Lasso', 'Pastocalle', 'Poalo', 'Tanicuchi', 'Toacaso', 'Mulalo'
            ],
            'ORO' => [
                'El Guabo', 'Huaquillas', 'Machala', 'Pasaje', 'Piñas', 'Puerto Bolivar', 'Santa Rosa', 'Zaruma', 'Portovelo', 'Arenillas', 'Atahualpa', 'Balsas', 'Chilla', 'Marcabeli'
            ],
            'ESM' => [
                'Esmeraldas'
            ],
            'GUA' => [
                'Guayaquil', 'Daule', 'Duran', 'El Empalme'
            ],
            'STA' => [
                'Santa Elena', 'La Libertad', 'Salinas'
            ],
            'LOJ' => [
                'Loja', 'Macara', 'Catamayo', 'Cariamanga', 'Celica'
            ],
            'MOR' => [
                'Macas', 'Gualaquiza', 'Limon Indanza', 'Santiago', 'Sucua'
            ],
            'IMB' => [
                'Ibarra', 'Ambuqui', 'Atuntaqui', 'Cotacachi', 'Otavalo'
            ],
            'LOR' => [
                'Babahoyo', 'Buena Fe', 'Puebloviejo', 'Quevedo', 'Ventanas'
            ],
            'MAN' => [
                'Portoviejo', 'Bahia De Caraquez', 'Chone', 'El Carmen', 'Jipijapa'
            ],
            'NAP' => [
                'Tena', 'Archidona', 'Baeza', 'El Chaco', 'Carlos Julio Arosemena Tola'
            ],
            'ORE' => [
                'Francisco De Orellana', 'La Joya De Los Sachas', 'Loreto', 'Nuevo Rocafuerte'
            ],
            'PAS' => [
                'Puyo', 'Mera', 'Palora', 'Shell', 'Arajuno'
            ],
            'SDT' => [
                'Santo Domingo', 'Alluriquin', 'Luz De América', 'Valle Hermoso'
            ],
            'PIC' => [
                'Quito', 'Cayambe', 'Conocoto', 'Cumbaya', 'Machachi'
            ],
            'SUC' => [
                'Nueva Loja', 'Gonzalo Pizarro', 'Putumayo', 'Shushufindi', 'Sucumbios'
            ],
            'TUN' => [
                'Ambato', 'Baños', 'Cevallos', 'Izamba', 'Mocha'
            ],
            'ZAM' => [
                'Zamora', 'Chinchipe', 'Nangaritza', 'Yacuambi', 'Yantzaza'
            ],
        ];

        $cities = [];

        // Generar los identificadores incrementales y poblar el array $cities
        foreach ($provinces as $provinceCode => $cityList) {
            foreach ($cityList as $index => $cityName) {
                $cities[] = [
                    'id' => $provinceCode . '-' . str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                    'name' => $cityName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insertar los datos en la base de datos
        DB::table('cities')->insert($cities);
    }
}
