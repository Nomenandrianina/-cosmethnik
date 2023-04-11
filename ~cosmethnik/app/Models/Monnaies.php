<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Monnaies
 * @package App\Models
 * @version March 9, 2023, 1:59 pm +07
 *
 * @property string $description
 */
class Monnaies extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public $table = 'monnaies';

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
        'description'=>'required',
    ];

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }

}
