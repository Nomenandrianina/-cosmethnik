<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Allegations
 * @package App\Models
 * @version March 10, 2023, 7:07 pm +07
 *
 * @property string $nom
 */
class Allegations extends Model
{
    use SoftDeletes;


    public $table = 'allegations';


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

    public function modele_allegations()
    {
        return $this->hasMany(Modele_allegations::class);
    }


}
