<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Physico_chimiques
 * @package App\Models
 * @version March 10, 2023, 6:45 pm +07
 *
 * @property integer $nom
 * @property string $unite
 */
class Physico_chimiques extends Model
{
    use SoftDeletes;


    public $table = 'physico_chimiques';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'unite'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'integer',
        'unite' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
