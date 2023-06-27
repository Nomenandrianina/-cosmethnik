<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Dossiers
 * @package App\Models
 * @version February 20, 2023, 2:35 pm +07
 *
 * @property \Illuminate\Database\Eloquent\Collection $sites
 * @property string $name
 * @property string $title
 * @property string $description
 */
class Dossiers extends Model
{
    use SoftDeletes;


    public $table = 'dossiers';


    protected $dates = ['created_at','deleted_at'];

    public $timestamps = false;


    public $fillable = [
        'name',
        'sites_id',
        'title',
        'parent_id',
        'link',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sites_id' => 'integer',
        'name' => 'string',
        'parent_id' => 'integer',
        'link' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'title' => 'required',
        'sites_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function site()
    {
        return $this->belongsTo(Sites::class, 'sites_id');
    }

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }

    public function produit_semi_finis()
    {
        return $this->hasMany(Produit_semi_finis::class);
    }

    public function childs() {
        return $this->hasMany(Dossiers::class,'parent_id','id') ;
    }
}
