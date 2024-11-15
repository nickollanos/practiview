<?php

namespace Database\Seeders;

use App\Models\Programa_formacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Programa_FormacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programas_formacion = [
            [
                'codigo_programa'        => '123456',
                'denominacion'           => 'Técnico en Comercio y Servicios',
                'version'                => '1.0',
                'etapa_lectiva'          => '12',
                'etapa_productiva'       => '6',
                'total_horas'            => '1080',
                'tipo_programa'          => 'Técnico',
                'titulo_certificado'     => 'Técnico en Comercio y Servicios',
                'centro_formacion_id'    => '1',
                'instructor_id'          => '1',
                'aprendiz_id'            => '1',
            ],
            // [
            //     'codigo_programa'        => '123457',
            //     'denominacion'           => 'Tecnólogo en Diseño Gráfico',
            //     'version'                => '2.0',
            //     'etapa_lectiva'          => '16',
            //     'etapa_productiva'       => '8',
            //     'total_horas'            => '1360',
            //     'tipo_programa'          => 'Tecnólogo',
            //     'titulo_certificado'     => 'Tecnólogo en Diseño Gráfico',
            //     'centro_formacion_id'    => '2',
            //     'instructor_id'          => '2',
            //     'aprendiz_id'            => '2',
            // ],
            // [
            //     'codigo_programa'        => '345678',
            //     'denominacion'           => 'Técnico en Mantenimiento de Equipos Electrónicos',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '10',
            //     'etapa_productiva'       => '4',
            //     'total_horas'            => '720',
            //     'tipo_programa'          => 'Técnico',
            //     'titulo_certificado'     => 'Técnico en Mantenimiento de Equipos Electrónicos',
            //     'centro_formacion_id'    => '3',
            //     'instructor_id'          => '3',
            //     'aprendiz_id'            => '3',
            // ],
            // [
            //     'codigo_programa'        => '456789',
            //     'denominacion'           => 'Tecnólogo en Gestión de Recursos Humanos',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '14',
            //     'etapa_productiva'       => '6',
            //     'total_horas'            => '1200',
            //     'tipo_programa'          => 'Tecnólogo',
            //     'titulo_certificado'     => 'Tecnólogo en Gestión de Recursos Humanos',
            //     'centro_formacion_id'    => '4',
            //     'instructor_id'          => '4',
            //     'aprendiz_id'            => '4',
            // ],
            // [
            //     'codigo_programa'        => '567890',
            //     'denominacion'           => 'Técnico en Gastronomía',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '12',
            //     'etapa_productiva'       => '6',
            //     'total_horas'            => '1080',
            //     'tipo_programa'          => 'Técnico',
            //     'titulo_certificado'     => 'Técnico en Gastronomía',
            //     'centro_formacion_id'    => '5',
            //     'instructor_id'          => '5',
            //     'aprendiz_id'            => '5',
            // ],
            // [
            //     'codigo_programa'        => '678901',
            //     'denominacion'           => 'Tecnólogo en Desarrollo de Software',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '16',
            //     'etapa_productiva'       => '8',
            //     'total_horas'            => '1360',
            //     'tipo_programa'          => 'Tecnólogo',
            //     'titulo_certificado'     => 'Tecnólogo en Desarrollo de Software',
            //     'centro_formacion_id'    => '2',
            //     'instructor_id'          => '6',
            //     'aprendiz_id'            => '6',
            // ],
            // [
            //     'codigo_programa'        => '789012',
            //     'denominacion'           => 'Técnico en Construcción',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '10',
            //     'etapa_productiva'       => '5',
            //     'total_horas'            => '720',
            //     'tipo_programa'          => 'Técnico',
            //     'titulo_certificado'     => 'Técnico en Construcción',
            //     'centro_formacion_id'    => '3',
            //     'instructor_id'          => '7',
            //     'aprendiz_id'            => '7',
            // ],
            // [
            //     'codigo_programa'        => '890123',
            //     'denominacion'           => 'Tecnólogo en Administración Empresarial',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '12',
            //     'etapa_productiva'       => '6',
            //     'total_horas'            => '1080',
            //     'tipo_programa'          => 'Tecnólogo',
            //     'titulo_certificado'     => 'Tecnólogo en Administración Empresarial',
            //     'centro_formacion_id'    => '4',
            //     'instructor_id'          => '8',
            //     'aprendiz_id'            => '8',
            // ],
            // [
            //     'codigo_programa'        => '901234',
            //     'denominacion'           => 'Técnico en Electricidad',
            //     'version'                => '1.0',
            //     'etapa_lectiva'          => '10',
            //     'etapa_productiva'       => '5',
            //     'total_horas'            => '720',
            //     'tipo_programa'          => 'Técnico',
            //     'titulo_certificado'     => 'Técnico en Electricidad',
            //     'centro_formacion_id'    => '3',
            //     'instructor_id'          => '9',
            //     'aprendiz_id'            => '9',
            // ],
        ];

        foreach ($programas_formacion as $programa_formacion){
            $programa_formacion = Programa_formacion::firstOrNew($programa_formacion);
            if(!$programa_formacion->exists){
                $programa_formacion->save();
            }
        }
    }
}
