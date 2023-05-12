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
 * @property integer $unite
 * @property integer $dossier_id
 */
class Emballages extends Model
{
    use SoftDeletes;


    public $table = 'emballages';


    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public $fillable = [
        'nom',
        'titre',
        'dossier_id',
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
        'dossier_id' => 'integer',
        'description' => 'string',
        'unite' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
    ];

    public function modele_emballages()
    {
        return $this->hasMany(Modele_emballages::class);
    }

}
