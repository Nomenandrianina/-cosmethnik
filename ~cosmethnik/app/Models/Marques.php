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

    public $timestamps = false;

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
        'description'=>'required'
    ];

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }


}
