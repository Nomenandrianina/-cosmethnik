<?php

namespace App\Enums;

enum DossierTitleEnum:string {
    case Produit_fini = 'Produit fini';
    case Produit_semi_fini = 'Produit semi-fini';
    case Matiere_premiere = 'Matière première';
    case Ressource = 'Ressource';
}
