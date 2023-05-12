<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'   => 'Ces informations d\'identification ne correspondent pas à nos enregistrements.',
    'password' => 'Le mot de passe  est incorrect.',
    'throttle' => 'Trop de tentatives de connexion. Veuillez réessayer dans :secondes secondes.',
    'login' => [
        'title' => 'Se connecter',
        'field' => [
            'email' => 'Email',
            'password' => 'Mot de passe',
            'remember' => 'Se souvenir'
        ],
        'button' => [
            'submit' => 'Se connecter',
            'reset-password' => 'Mot de passe oublié?',
            'register' => 'Ajouter un nouveau utilisateur'
        ]
    ],
    'register' => [
        'title' => 'Ajouter un nouveau utilisateur',
        'field' => [
            'fullname' => 'Nom',
            'email' => 'Email',
            'password' => 'Mot de passe',
            'password2' => 'Confirmer votre mot de passe',
            'agreeTerms' => 'J\'accepte les  <a href=":link">conditions</a>'
        ],
        'button' => [
            'submit' => 'Accepter',
            'login' => 'Déjà inscrit(e) ? S\'identifier',
            'reset-password' => 'Mot de passe oublié ?'
        ]
    ],
    'app'=>[
        'create'=>'Ajouter',
        'export'=>'Exporter',
        'print'=>'Imprimer',
        'reload'=>'Recharger',
        'reset'=>'Réinitialiser'
    ],
    'verify' => [
        'title' => 'Vérifiez votre adresse e-mail',
        'message' => [
            'resent' => 'Un nouveau lien de vérification a été envoyé à
            Votre adresse e-mail',
            'info' => 'Avant de continuer, veuillez vérifier votre e-mail pour un lien de vérification. Si vous n\'avez pas reçu
            le courriel,'
        ],
        'button' => [
            'request-new' => 'cliquez ici pour un autre requête'
        ]
    ],
    'confirm' => [
        'title' => 'Veuillez confirmer votre mot de passe avant de continuer.',
        'field' => [
            'password' => 'Mot de passe',
        ],
        'button' => [
            'submit' => 'Confirmer votre mot de passe',
            'reset-password' => 'Mot de passe oublié ?'
        ]
    ],
    'email' => [
        'title' => 'Vous avez oublié votre mot de passe ? Ici, vous pouvez facilement récupérer un nouveau mot de passe.',
        'field' => [
            'email' => 'Email',
        ],
        'button' => [
            'submit' => 'Envoyer le lien de réinitialisation',
            'login' => 'Se connecter',
            'register'=>'Ajouter un nouveau utilisateur'
        ]
    ]
];
