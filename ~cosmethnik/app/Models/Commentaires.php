<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;


/**
 * Class Commentaires
 * @package App\Models
 * @version March 9, 2023, 1:10 pm +07
 *
 * @property string $description
 * @property string $model_type
 * @property integer $model_id
 */
class Commentaires extends Model
{
    use SoftDeletes;


    public $table = 'commentaires';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'description',
        'model_type',
        'model_id',
        'user_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'model_type' => 'string',
        'model_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


}
