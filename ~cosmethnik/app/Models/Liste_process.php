<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Liste_process
 * @package App\Models
 * @version March 9, 2023, 9:03 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property integer $ressource_id
 * @property string etape
 * @property integer $quantite
 * @property number $cadence
 * @property string $unite_cadence
 * @property number $taux_horaire
 * @property number $produit_heure
 */
class Liste_process extends Model
{
    use SoftDeletes;


    public $table = 'liste_process';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'etape',
        'ressource_id',
        'quantite',
        'cadence',
        'unite_cadence',
        'taux_horaire',
        'produit_heure'
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
        'etape' => 'string',
        'ressource_id' => 'integer',
        'quantite' => 'integer',
        'cadence' => 'double',
        'unite_cadence' => 'string',
        'taux_horaire' => 'decimal:2',
        'produit_heure' => 'double'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'etape' => 'required'
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function ressource(){
        return $this->belongsTo(Ressources::class, 'ressource_id');
    }


}
