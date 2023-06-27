<?php

use App\Models\Emballages;
use App\Models\Matiere_premiere;
use App\Models\Produit_fini;
use App\Models\Produit_semi_finis;
use App\Models\Ressources;

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
                case (strcasecmp($dossier_name, "matière première") == 0 || strcasecmp($dossier_name, "matières première") == 0 || strcasecmp($dossier_name, "matière premières") == 0 || strcasecmp($dossier_name, "matières premières") ==0):
                    return new Matiere_premiere();
                    break;
                case (strcasecmp($dossier_name, "emballage") == 0 || strcasecmp($dossier_name, "emballages") == 0):
                    return new Emballages();
                    break;
                case (strcasecmp($dossier_name, "ressource") == 0 || strcasecmp($dossier_name, "ressources") == 0):
                    return new Ressources();
                    break;
        }

    }
}

if (!function_exists('DefaultDossier')) {
    function DefaultDossier($id_site,$id_racine){
        $data = [
            ['sites_id' => $id_site, 'name' => 'Produits fini', 'title' => 'Produits fini', 'description' => '', 'parent_id' => $id_racine, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/produitsfini'],
            ['sites_id' => $id_site, 'name' => 'Produits semi-fini', 'title' => 'Produits semi-fini', 'description' => '', 'parent_id' => $id_racine, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/produitssemi-fini'],
            ['sites_id' => $id_site, 'name' => 'Matières premières', 'title' => 'Matières premières', 'description' => '', 'parent_id' => $id_racine, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/matierepremiere'],
            ['sites_id' => $id_site, 'name' => 'Emballages', 'title' => 'Emballages', 'description' => '', 'parent_id' => $id_racine, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/emballages'],
            ['sites_id' => $id_site, 'name' => 'Ressources', 'title' => 'Ressources', 'description' => '', 'parent_id' => $id_racine, 'link' => 'http://127.0.0.1:8000/~cosmethnik/admin/dossiers/ressources']
        ];

        return $data;
    }
}

function dateParse($date){
    $dateTime = new DateTime($date);
    // Formater la date dans le format souhaité
    $formattedDate = $dateTime->format('d F Y');

    return $formattedDate;
}
