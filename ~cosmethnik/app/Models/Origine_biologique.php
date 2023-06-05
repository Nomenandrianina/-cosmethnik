<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Origine_biologique
 * @package App\Models
 * @version June 5, 2023, 1:28 pm +07
 *
 * @property string $nom
 */
class Origine_biologique extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    public $table = 'origine_biologique';

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nom' => 'required',
    ];


}
