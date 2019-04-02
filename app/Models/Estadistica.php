<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estadistica
 * @package App\Models
 * @version March 31, 2019, 10:35 pm UTC
 *
 * @property integer año
 * @property double ta
 * @property double is
 * @property double if
 * @property double ma
 * @property double ili
 * @property double iel
 * @property double pel
 * @property double ieg
 * @property double peg
 */
class Estadistica extends Model
{
    use SoftDeletes;

    public $table = 'estadisticas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'año',
        'ta',
        'is',
        'if',
        'ma',
        'ili',
        'iel',
        'pel',
        'ieg',
        'peg'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'año' => 'integer',
        'ta' => 'double',
        'is' => 'double',
        'if' => 'double',
        'ma' => 'double',
        'ili' => 'double',
        'iel' => 'double',
        'pel' => 'double',
        'ieg' => 'double',
        'peg' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'año' => 'required',
        'ta' => 'required',
        'is' => 'required',
        'if' => 'required',
        'ma' => 'required',
        'ili' => 'required',
        'iel' => 'required',
        'pel' => 'required',
        'ieg' => 'required',
        'peg' => 'required'
    ];

    
}
