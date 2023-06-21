<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Nutriments
 * @package App\Models
 * @version June 12, 2023, 7:07 pm +07
 *
 * @property integer $nom
 */
class Nutriments extends Model
{
    use SoftDeletes;


    public $table = 'nutriments';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required'
    ];


}
