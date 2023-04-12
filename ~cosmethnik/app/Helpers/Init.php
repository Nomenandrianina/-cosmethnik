<?php
use App\Models\Produit_fini;
use App\Models\Produit_semi_finis;


if (!function_exists('fast_trans')) {

    function fast_trans($key, $replace, $default = null)
    {
        $value = __($key, $replace);
        if ($value == $key && $default != null) {
            $value = $default;
        }
        return $value;
    }

}
if (!function_exists('DeterminateObject')) {
    function DeterminateObject($dossier_name){
            switch ($dossier_name) {
                case (strcasecmp($dossier_name, "produit fini") == 0 || strcasecmp($dossier_name, "produits finis") == 0 || strcasecmp($dossier_name, "produits fini") == 0 || strcasecmp($dossier_name, "produit finis") == 0):
                    return new Produit_fini();
                    break;
                case (strcasecmp($dossier_name, "produit semi-fini") == 0 || strcasecmp($dossier_name, "produits semi-finis") == 0 || strcasecmp($dossier_name, "produits semi-fini") == 0 || strcasecmp($dossier_name, "produit semi-finis") ==0):
                    return new Produit_semi_finis();
                    break;
        }

    }
}
