<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Filiales
 * @package App\Models
 * @version March 9, 2023, 4:12 pm +07
 *
 * @property integer $description
 */
class Filiales extends Model
{
    use SoftDeletes;


    public $table = 'filiales';


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
        'description' => 'integer'
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
