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
 */
class Couts extends Model
{
    use SoftDeletes;

    public $table = 'Couts';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nom',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required'
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function modele_couts()
    {
        return $this->hasMany(Modele_cout::class);
    }

}
