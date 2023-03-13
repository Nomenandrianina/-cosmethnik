<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Marques
 * @package App\Models
 * @version March 10, 2023, 7:21 pm +07
 *
 * @property integer $nom
 */
class Marques extends Model
{
    use SoftDeletes;


    public $table = 'marques';


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
        'nom' => 'integer'
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
