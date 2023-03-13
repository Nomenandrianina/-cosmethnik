<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Class Famille
 * @package App\Models
 * @version March 9, 2023, 1:33 pm +07
 *
 * @property string $nom
 * @property integer $parent__id
 * @property string $model_type
 * @property integer $model_id
 */
class Famille extends Model
{
    use SoftDeletes;


    public $table = 'famille';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'parent_id',
        'model_type',
        'model_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'parent_id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function childs() {
        return $this->hasMany(Famille::class,'parent_id','id') ;
    }

    public function model(): MorphTo
    {
        return $this->morphTo();
    }


}
