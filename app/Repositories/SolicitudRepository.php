<?php

namespace App\Repositories;

use App\Models\Solicitud;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SolicitudRepository
 * @package App\Repositories
 * @version March 26, 2019, 8:29 pm UTC
 *
 * @method Solicitud findWithoutFail($id, $columns = ['*'])
 * @method Solicitud find($id, $columns = ['*'])
 * @method Solicitud first($columns = ['*'])
*/
class SolicitudRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fecha_registro',
        'identificacion',
        'nombre',
        'fecha_cita',
        'hora_cita',
        'cod_institucion',
        'cod_tipo_examen',
        'cod_examen',
        'observaci n',
        'estado'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Solicitud::class;
    }
}
