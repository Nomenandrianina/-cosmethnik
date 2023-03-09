<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Precaution_emploi
 * @package App\Models
 * @version March 9, 2023, 3:10 pm +07
 *
 * @property string $description
 */
class Precaution_emploi extends Model
{
    use SoftDeletes;


    public $table = 'precaution_emploi';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
