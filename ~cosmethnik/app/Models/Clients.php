<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Clients
 * @package App\Models
 * @version March 9, 2023, 6:30 pm +07
 *
 * @property string $nom
 * @property string $titre
 * @property string $etat_client
 * @property string $code_bcpg
 * @property string $code_erp
 * @property string $telephone
 * @property string $mail
 * @property string $fax
 * @property string $adress1
 * @property string $adress2
 * @property string $adress3
 * @property string $ville
 * @property string $code_postal
 * @property integer $pays_id
 */
class Clients extends Model
{
    use SoftDeletes;


    public $table = 'clients';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nom',
        'titre',
        'etat_client',
        'code_bcpg',
        'code_erp',
        'telephone',
        'mail',
        'fax',
        'adress1',
        'adress2',
        'adress3',
        'ville',
        'code_postal',
        'pays_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nom' => 'string',
        'titre' => 'string',
        'etat_client' => 'string',
        'code_bcpg' => 'string',
        'code_erp' => 'string',
        'telephone' => 'string',
        'mail' => 'string',
        'fax' => 'string',
        'adress1' => 'string',
        'adress2' => 'string',
        'adress3' => 'string',
        'ville' => 'string',
        'code_postal' => 'string',
        'pays_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    **/
    public function Pays()
    {
        return $this->belongsTo(Pays::class, 'pays_id');
    }

    public function produit_finis()
    {
        return $this->hasMany(Produit_fini::class);
    }


}
