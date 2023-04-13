<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Geographiques
 * @package App\Models
 * @version March 9, 2023, 4:02 pm +07
 *
 * @property string $description
 */
class Geographiques extends Model
{
    use SoftDeletes;


    public $table = 'geographique';


    protected $dates = ['deleted_at'];

    public $timestamps = false;

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
