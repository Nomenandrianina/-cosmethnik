<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_nutriment
 * @package App\Models
 * @version June 13, 2023, 2:06 pm +07
 *
 * @property integer $nutriment_id
 * @property string $model_type
 * @property integer $ model_id
 * @property integer $valeur
 * @property string $unite
 * @property integer $mini
 * @property integer $maxi
 * @property integer $portion
 * @property string $unite_portion
 * @property integer $ajr_portion
 * @property integer $perte
 * @property string $methode
 */
class Modele_nutriment extends Model
{
    use SoftDeletes;


    public $table = 'modele_nutriment';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nutriment_id',
        'model_type',
        'model_id',
        'valeur',
        'unite',
        'mini',
        'maxi',
        'portion',
        'unite_portion',
        'ajr_portion',
        'perte',
        'methode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nutriment_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer',
        'valeur' => 'integer',
        'unite' => 'string',
        'mini' => 'integer',
        'maxi' => 'integer',
        'portion' => 'integer',
        'unite_portion' => 'string',
        'ajr_portion' => 'integer',
        'perte' => 'integer',
        'methode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'valeur' => 'required',
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function nutriment(){
        return $this->belongsTo(Nutriments::class, 'nutriment_id');
    }


}
