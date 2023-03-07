<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'Ce champ doit être accepté.',
    'active_url'           => 'Ceci n\'est pas une URL valide.',
    'after'                => 'Cela doit être une date après :date.',
    'after_or_equal'       => 'Il doit s\'agir d\'une date postérieure ou égale à :date.',
    'alpha'                => 'Ce champ ne peut contenir que des lettres.',
    'alpha_dash'           => 'Ce champ ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num'            => 'Ce champ ne peut contenir que des lettres et des chiffres.',
    'array'                => 'Ce champ doit être un tableau.',
    'attached'             => 'Ce champ est déjà attaché.',
    'before'               => 'Cela doit être une date avant :date.',
    'before_or_equal'      => 'Il doit s\'agir d\'une date antérieure ou égale à :date.',
    'between'              => [
        'numeric' => 'Cette valeur doit être comprise entre :min et :max.',
        'file'    => 'Ce fichier doit être compris entre :min et :max kilobytes.',
        'string'  => 'Cette chaîne doit être comprise entre :min et :max caractères.',
        'array'   => 'Ce contenu doit avoir entre :min et :max éléments.',
    ],
    'boolean'              => 'Ce champ doit être vrai ou faux.',
    'confirmed'            => 'La confirmation ne correspond pas.',
    'current_password'     => 'Le mot de passe est incorrect.',
    'date'                 => 'Ceci n\'est pas une date valide.',
    'date_equals'          => 'Il doit s\'agir d\'une date égale à :date.',
    'date_format'          => 'Cela ne correspond pas au format :format.',
    'different'            => 'Cette valeur doit être différente de :other.',
    'digits'               => 'Cela doit être :chiffres chiffres.',
    'digits_between'       => 'Celui-ci doit être compris entre :min et :max chiffres.',
    'dimensions'           => 'Cette image a des dimensions invalides.',
    'distinct'             => 'Ce champ a une valeur en double.',
    'email'                => 'Ce doit être une adresse e-mail valide.',
    'ends_with'            => 'Celui-ci doit se terminer par l\'un des éléments suivants : :values.',
    'exists'               => 'La valeur sélectionnée n\'est pas valide.',
    'file'                 => 'Le contenu doit être un fichier.',
    'filled'               => 'Ce champ doit avoir une valeur.',
    'gt'                   => [
        'numeric' => 'The value must be greater than :value.',
        'file'    => 'The file size must be greater than :value kilobytes.',
        'string'  => 'The string must be greater than :value characters.',
        'array'   => 'The content must have more than :value items.',
    ],
    'gte'                  => [
        'numeric' => 'The value must be greater than or equal :value.',
        'file'    => 'The file size must be greater than or equal :value kilobytes.',
        'string'  => 'The string must be greater than or equal :value characters.',
        'array'   => 'The content must have :value items or more.',
    ],
    'image'                => 'Cela doit être une image.',
    'in'                   => 'La valeur sélectionnée n\'est pas valide.',
    'in_array'             => 'This value does not exist in :other.',
    'integer'              => 'This must be an integer.',
    'ip'                   => 'This must be a valid IP address.',
    'ipv4'                 => 'This must be a valid IPv4 address.',
    'ipv6'                 => 'This must be a valid IPv6 address.',
    'json'                 => 'This must be a valid JSON string.',
    'lt'                   => [
        'numeric' => 'The value must be less than :value.',
        'file'    => 'The file size must be less than :value kilobytes.',
        'string'  => 'The string must be less than :value characters.',
        'array'   => 'The content must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => 'The value must be less than or equal :value.',
        'file'    => 'The file size must be less than or equal :value kilobytes.',
        'string'  => 'The string must be less than or equal :value characters.',
        'array'   => 'The content must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => 'The value may not be greater than :max.',
        'file'    => 'The file size may not be greater than :max kilobytes.',
        'string'  => 'The string may not be greater than :max characters.',
        'array'   => 'The content may not have more than :max items.',
    ],
    'mimes'                => 'This must be a file of type: :values.',
    'mimetypes'            => 'This must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The value must be at least :min.',
        'file'    => 'The file size must be at least :min kilobytes.',
        'string'  => 'The string must be at least :min characters.',
        'array'   => 'The value must have at least :min items.',
    ],
    'multiple_of'          => 'The value must be a multiple of :value',
    'not_in'               => 'The selected value is invalid.',
    'not_regex'            => 'This format is invalid.',
    'numeric'              => 'This must be a number.',
    'password'             => 'The password is incorrect.',
    'present'              => 'This field must be present.',
    'regex'                => 'This format is invalid.',
    'relatable'            => 'This field may not be associated with this resource.',
    'required'             => 'This field is required.',
    'required_if'          => 'This field is required when :other is :value.',
    'required_unless'      => 'This field is required unless :other is in :values.',
    'required_with'        => 'This field is required when :values is present.',
    'required_with_all'    => 'This field is required when :values are present.',
    'required_without'     => 'This field is required when :values is not present.',
    'required_without_all' => 'This field is required when none of :values are present.',
    'prohibited'           => 'This field is prohibited.',
    'prohibited_if'        => 'This field is prohibited when :other is :value.',
    'prohibited_unless'    => 'This field is prohibited unless :other is in :values.',
    'same'                 => 'The value of this field must match the one from :other.',
    'size'                 => [
        'numeric' => 'The value must be :size.',
        'file'    => 'The file size must be :size kilobytes.',
        'string'  => 'The string must be :size characters.',
        'array'   => 'The content must contain :size items.',
    ],
    'starts_with'          => 'This must start with one of the following: :values.',
    'string'               => 'This must be a string.',
    'timezone'             => 'This must be a valid timezone.',
    'unique'               => 'This has already been taken.',
    'uploaded'             => 'This failed to upload.',
    'url'                  => 'This must be a valid URL.',
    'uuid'                 => 'This must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

];
