<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Class Modele_ingredients
 * @package App\Models
 * @version March 10, 2023, 2:01 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property integer $quantite
 * @property boolean $ogm
 * @property boolean $ionisation
 * @property boolean $auxilliaire_technologie
 * @property boolean $support
 * @property integer $ingredient_id
 */
class Modele_ingredients extends Model
{
    use SoftDeletes;


    public $table = 'modele_ingredients';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'quantite',
        'ogm',
        'ionisation',
        'auxilliaire_technologie',
        'support',
        'ingredient_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer',
        'quantite' => 'integer',
        'ogm' => 'boolean',
        'ionisation' => 'boolean',
        'auxilliaire_technologie' => 'boolean',
        'support' => 'boolean',
        'ingredient_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }


}
