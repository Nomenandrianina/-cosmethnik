<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Physico_chimiques
 * @package App\Models
 * @version March 10, 2023, 6:45 pm +07
 *
 * @property string $nom
 * @property string $unite
 */
class Physico_chimiques extends Model
{
    use SoftDeletes;

    public $table = 'physico_chimiques';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nom',
        'unite_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'unite_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom'=>'required',
        'unite_id'=>'required'
    ];

    public function modele_physico_chimiques()
    {
        return $this->hasMany(Modele_physico_chimique::class);
    }

    public function unite(){
        return $this->belongsTo(Unites::class, 'unite_id');
    }

}
