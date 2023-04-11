<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Organoleptiques
 * @package App\Models
 * @version March 10, 2023, 6:35 pm +07
 *
 * @property string $nom
 */
class Organoleptiques extends Model
{
    use SoftDeletes;


    public $table = 'organoleptiques';

    public $timestamps = false;

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
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
        'nom'=>'required',
    ];

    public function mmodele_organoleptiques()
    {
        return $this->hasMany(Modele_organoleptiques::class);
    }
}
