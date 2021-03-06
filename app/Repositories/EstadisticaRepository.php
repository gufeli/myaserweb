<?php

namespace App\Repositories;

use App\Models\Estadistica;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadisticaRepository
 * @package App\Repositories
 * @version April 5, 2019, 4:49 am UTC
 *
 * @method Estadistica findWithoutFail($id, $columns = ['*'])
 * @method Estadistica find($id, $columns = ['*'])
 * @method Estadistica first($columns = ['*'])
*/
class EstadisticaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'año',
        'ta',
        'is',
        'if',
        'ma',
        'ili'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estadistica::class;
    }
}
