<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_organoleptiques
 * @package App\Models
 * @version March 10, 2023, 6:43 pm +07
 *
 * @property string $caractéristique
 * @property string $valeur
 * @property string $model_type
 * @property integer $model_id
 * @property integer $organoleptique_id
 */
class Modele_organoleptiques extends Model
{
    use SoftDeletes;


    public $table = 'modele_organoleptiques';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'caractéristique',
        'valeur',
        'model_type',
        'model_id',
        'organoleptique_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'caractéristique' => 'string',
        'valeur' => 'string',
        'model_type' => 'string',
        'model_id' => 'integer',
        'organoleptique_id' => 'integer'
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

    public function organoleptique(){
        return $this->belongsTo(Organoleptiques::class, 'organoleptique_id');
    }

}
