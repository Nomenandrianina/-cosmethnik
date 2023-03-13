<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Activités
 * @package App\Models
 * @version March 10, 2023, 7:36 pm +07
 *
 * @property integer $model_type
 * @property integer $model_id
 * @property string $action
 * @property integer $user_id
 */
class Activites extends Model
{
    use SoftDeletes;


    public $table = 'activites';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'action',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model_type' => 'integer',
        'model_id' => 'integer',
        'action' => 'string',
        'user_id' => 'integer'
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


    public function model(): MorphTo{
        return $this->morphTo();
    }


}
