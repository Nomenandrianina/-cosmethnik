<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Unites
 * @package App\Models
 * @version March 9, 2023, 3:32 pm +07
 *
 * @property string $description
 */
class Unites extends Model
{
    use SoftDeletes;


    public $table = 'unites';

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
        'description'=>'required',
    ];

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }

    public function ressources()
    {
        return $this->hasMany(Ressources::class);
    }

    public function physico_chimique()
    {
        return $this->hasMany(Physico_chimiques::class);
    }

}
