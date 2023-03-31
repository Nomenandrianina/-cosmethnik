<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Produit_semi_finis;

class CreateProduit_semi_finisRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom'=>'required',
            'libelle_commerciale'=>'required',
            'code_bcepg'=>'required',
            // 'code_erp'=>'required',
            'libelle_legale'=>'required',
            // 'description'=>'required'
        ];
        // $this->validate()
        // return Produit_semi_finis::$rules;
    }
}
