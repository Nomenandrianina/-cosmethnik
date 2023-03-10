<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Pays
 * @package App\Models
 * @version March 9, 2023, 6:22 pm +07
 *
 * @property string $name
 */
class Pays extends Model
{
    use SoftDeletes;


    public $table = 'pays';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function Clients(){
        return $this->hasMany(Clients::class,'pays_id','id');
    }

}
