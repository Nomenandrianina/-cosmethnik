<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Emballages
 * @package App\Models
 * @version March 9, 2023, 7:57 pm +07
 *
 * @property string $nom
 * @property string $titre
 * @property string $description
 * @property string $unite
 */
class Emballages extends Model
{
    use SoftDeletes;


    public $table = 'emballages';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'titre',
        'description',
        'unite'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'titre' => 'string',
        'description' => 'string',
        'unite' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function modele_emballages()
    {
        return $this->hasMany(Modele_emballages::class);
    }


}
