<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Ingredients
 * @package App\Models
 * @version March 10, 2023, 1:52 pm +07
 *
 * @property string $nom
 * @property string $origine_geographique
 * @property string $pays_transformation
 * @property string $origine_biologique
 */
class Ingredients extends Model
{
    use SoftDeletes;


    public $table = 'ingredients';

    public $timestamps = false;

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'origine_geographique',
        'pays_transformation',
        'origine_biologique'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'origine_geographique' => 'string',
        'pays_transformation' => 'string',
        'origine_biologique' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom'=>'required',
        'origine_biologique'=>'required'
    ];

    public function modele_ingredients()
    {
        return $this->hasMany(Modele_ingredients::class);
    }

}
