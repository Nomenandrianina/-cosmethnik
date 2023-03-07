<?php

return [

    /*
    |--------------------------------------------------------------------------
    | common Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */
    'module' => [
        'dashboard' => 'Tableau de bord',
        'home' => 'Accueil',
        'users' => 'Utilisateur',
        'roles' => 'Rôle',
        'permissions' => 'Permission',
        'attendances'=>'Checkin/out',
        'generator_builder'=>'Générateur de CRUD'
    ],
    'permission' => [
        'home' => 'Accéder à la page d\'accueil',
        'users' => [
            'index' => 'Accéder à la page utilisateur'
        ],
        'generator_builder'=>[
            'index' => 'Accéder au générateur de CRUD',
            'field_template'=>'Accéder au modèle de fichier',
            'from_file'=>'À partir du fichier2',
            'rollback'=>'Restauration2'
        ]
    ],

];
