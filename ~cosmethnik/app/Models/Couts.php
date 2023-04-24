<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Couts
 * @package App\Models
 * @version March 10, 2023, 3:38 pm +07
 *
 * @property string $nom
 * @property number $valeur
 * @property string $unite
 * @property number $valeur1
 * @property number $valeur2
 * @property number $euv
 * @property boolean $manuel
 * @property string $model_type
 * @property integer $model_id
 */
class Couts extends Model
{
    use SoftDeletes;


    public $table = 'Couts';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'valeur',
        'unite',
        'valeur1',
        'valeur2',
        'euv',
        'manuel',
        'model_type',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'valeur' => 'decimal:2',
        'unite' => 'string',
        'valeur1' => 'decimal:2',
        'valeur2' => 'decimal:2',
        'euv' => 'decimal:2',
        'manuel' => 'boolean',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
        'valeur' => 'required',
        'unite' => 'required',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

}
