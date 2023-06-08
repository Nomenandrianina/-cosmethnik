<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_cout
 * @package App\Models
 * @version June 7, 2023, 2:11 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property integer $cout_id
 * @property number $valeur
 * @property string $unite
 * @property number $valeur1
 * @property number $valeur2
 * @property number $euv
 * @property boolean $manuel
 */
class Modele_cout extends Model
{
    use SoftDeletes;


    public $table = 'modele_cout';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'model_type',
        'model_id',
        'cout_id',
        'valeur',
        'unite',
        'valeur1',
        'valeur2',
        'euv',
        'manuel'
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
        'cout_id' => 'integer',
        'valeur' => 'decimal:2',
        'unite' => 'string',
        'valeur1' => 'decimal:2',
        'valeur2' => 'decimal:2',
        'euv' => 'decimal:2',
        'manuel' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valeur' => 'required',
        'valeur1' => 'required',
        'valeur2' => 'required',
    ];

    public function couts(){
        return $this->belongsTo(Couts::class, 'cout_id');
    }

}
