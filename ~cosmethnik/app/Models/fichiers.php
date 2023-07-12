<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Fichiers
 * @package App\Models
 * @version July 12, 2023, 1:49 pm +07
 *
 * @property string $model_type
 * @property integer $model_id
 * @property string $chemin
 * @property string $extension
 */
class Fichiers extends Model
{
    use SoftDeletes;


    public $table = 'fichiers';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'model_type',
        'model_id',
        'chemin',
        'extension'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'model_type' => 'string',
        'model_id' => 'integer',
        'chemin' => 'string',
        'extension' => 'string'
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


}
