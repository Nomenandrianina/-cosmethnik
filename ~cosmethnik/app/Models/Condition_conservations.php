<?php

namespace App\Models;

use Eloquent as Model;



/**
 * Class Condition_conservations
 * @package App\Models
 * @version March 9, 2023, 3:30 pm +07
 *
 * @property string $description
 */
class Condition_conservations extends Model
{


    public $table = 'condition_conservation';




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

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }

}
