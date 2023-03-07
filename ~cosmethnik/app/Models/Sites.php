<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Sites
 * @package App\Models
 * @version February 14, 2023, 2:09 pm +07
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property integer $user_id
 * @property string $type
 * @property string $nom
 */
class Sites extends Model
{
    use SoftDeletes;


    public $table = 'sites';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'type',
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'type' => 'string',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dossiers(){
        return $this->hasMany(Dossiers::class);
    }
}
