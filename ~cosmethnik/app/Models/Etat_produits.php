<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Etat_produits
 * @package App\Models
 * @version March 9, 2023, 4:27 pm +07
 *
 * @property string $designation
 */
class Etat_produits extends Model
{
    use SoftDeletes;


    public $table = 'etat_produit';


    protected $dates = ['deleted_at'];

    public $timestamps = false;

    public $fillable = [
        'designation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'designation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }

    public function ressources(){
        return $this->hasMany(Ressources::class);
    }

}
