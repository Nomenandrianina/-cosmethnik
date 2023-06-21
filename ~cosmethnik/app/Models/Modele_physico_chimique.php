<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_physico_chimique
 * @package App\Models
 * @version March 10, 2023, 6:59 pm +07
 *
 * @property string $caracteristique
 * @property string $valeur
 * @property integer $mini
 * @property integer $maxi
 * @property string $critere_texte
 * @property string $model_type
 * @property integer $model_id
 * @property integer $physico_chimique_id
 */
class Modele_physico_chimique extends Model
{
    use SoftDeletes;

    public $table = 'Modele_physico_chimiques';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'caracteristique',
        'valeur',
        'mini',
        'maxi',
        'critere_texte',
        'model_type',
        'model_id',
        'physico_chimique_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'caracteristique' => 'string',
        'valeur' => 'string',
        'mini' => 'integer',
        'maxi' => 'integer',
        'critere_texte' => 'string',
        'model_type' => 'string',
        'model_id' => 'integer',
        'physico_chimique_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'caracteristique' => 'required',
        'valeur' => 'required',
        'mini' => 'required',
        'maxi' => 'required',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function physico_chimique(){
        return $this->belongsTo(Physico_chimiques::class, 'physico_chimique_id');
    }


}
