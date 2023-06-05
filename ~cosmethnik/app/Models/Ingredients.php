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
 * @property integer $origine_geographique
 * @property integer $pays_transformation
 * @property integer $origine_biologique
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
        'origine_geographique' => 'integer',
        'pays_transformation' => 'integer',
        'origine_biologique' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom'=>'required'
    ];

    public function modele_ingredients()
    {
        return $this->hasMany(Modele_ingredients::class);
    }

    public function geographique(){
        return $this->belongsTo(Geographiques::class, 'origine_geographique');
    }

    public function transformation(){
        return $this->belongsTo(Geographiques::class, 'pays_transformation');
    }

    public function biologique(){
        return $this->belongsTo(Origine_biologique::class, 'origine_biologique');
    }

}
