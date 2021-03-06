<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Solicitud
 * @package App\Models
 * @version March 31, 2019, 9:57 pm UTC
 * @property \App\Models\Cupo cupo
 * @property \App\Models\Instituciones institucion
 * @property \App\Models\Examen examen
 * @property \App\Models\ExamenInstitucion exameninstitucion
 * @property date fecha_inicio
 * @property integer id_serial
 * @property string estado
 * @property string nombre
 * @property integer id_institucion
 * @property integer id_examen
 * @property integer id_examen_institucion
 * @property date fecha_cita
 * @property string progreso
 * @property string observacion
 * @property time hora
 */
class Solicitud extends Model
{
    use SoftDeletes;

    public $table = 'solicituds';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'fecha_inicio',
        'id_serial',
        //'estado',
        'nombre',
        'id_examen',
        'id_institucion',
        'id_examen_institucion',
        'fecha_cita',
        'progreso',
        'observacion',
        'hora'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fecha_inicio' => 'date',
        'id_serial' => 'integer',
        //'estado' => 'string',
        'nombre' => 'string',
        'id_examen' => 'integer',
        'id_institucion' => 'integer',
        'id_examen_institucion' => 'integer',
        'fecha_cita' => 'date',
        'progreso' => 'string',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fecha_inicio',
        'id_serial' ,
        //'estado' => 'required',
        'nombre' ,
        'id_examen',
        'id_institucion' ,
        'id_examen_institucion' ,
        'fecha_cita',
        'progreso' => 'required',
        'observacion',
        'hora' 
    ];
    public function cupo()
    {
        return $this->belongsTo(\App\Models\Cupo::class, 'id_serial');
    }

    public function institucion()
    {
        return $this->belongsTo(\App\Models\Instituciones::class, 'id_institucion');
    }
    public function examen()
    {
        return $this->belongsTo(\App\Models\Examenes::class, 'id_examen');
    }
    public function exameninstitucion()
    {
        return $this->belongsTo(\App\Models\ExamenInstitucion::class, 'id_examen_institucion');
    }
}
