<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Modele_allegations
 * @package App\Models
 * @version March 10, 2023, 7:11 pm +07
 *
 * @property string $allegation
 * @property string $revendique
 * @property string $information
 * @property string $date_certification
 * @property string $model_type
 * @property integer $model_id
 * @property integer $allegation_id
 */
class Modele_allegations extends Model
{
    use SoftDeletes;


    public $table = 'modele_allegations';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'allegation',
        'revendique',
        'information',
        'date_certification',
        'model_type',
        'model_id',
        'allegation_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'allegation' => 'string',
        'revendique' => 'string',
        'information' => 'string',
        'date_certification' => 'date',
        'model_type' => 'string',
        'model_id' => 'integer',
        'allegation_id' => 'integer'
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

    public function allegation(){
        return $this->belongsTo(Allegations::class, 'allegation_id');
    }


}
