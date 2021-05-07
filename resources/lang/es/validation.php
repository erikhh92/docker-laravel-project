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

    'accepted' => 'El campo :attribute tiene que ser aceptado.',
    'active_url' => 'El campo :attribute no es una URL válida.',
    'after' => 'El campo :attribute must be a date after :date.',
    'after_or_equal' => 'El campo :attribute must be a date after or equal to :date.',
    'alpha' => 'El campo :attribute must only contain letters.',
    'alpha_dash' => 'El campo :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'El campo :attribute must only contain letters and numbers.',
    'array' => 'El campo :attribute must be an array.',
    'before' => 'El campo :attribute must be a date before :date.',
    'before_or_equal' => 'El campo :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'El campo :attribute must be between :min and :max.',
        'file' => 'El campo :attribute must be between :min and :max kilobytes.',
        'string' => 'El campo :attribute must be between :min and :max characters.',
        'array' => 'El campo :attribute must have between :min and :max items.',
    ],
    'boolean' => 'El campo :attribute debe de ser verdadero o falso.',
    'confirmed' => 'El campo :attribute de confirmación no coincide.',
    'date' => 'El campo :attribute no es una fecha valida.',
    'date_equals' => 'El campo :attribute debe de ser igual que :date.',
    'date_format' => 'El campo :attribute no coincide con el formato :format.',
    'different' => 'Los campos :attribute y :other deben ser diferentes.',
    'digits' => 'El campo :attribute debe tener :digits digitos.',
    'digits_between' => 'El campo :attribute debe de tener entre :min y :max digitos.',
    'dimensions' => 'El campo :attribute tiene unas dimensiones no validas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado.',
    'email' => 'El campo :attribute tiene que ser un email válido.',
    'ends_with' => 'El campo :attribute debe terminar con uno de los siguientes valores: :values.',
    'exists' => 'The selected :attribute es invalido o no existe.',
    'file' => 'El campo :attribute debe ser un fichero.',
    'filled' => 'El campo :attribute debe tener algun valor.',
    'gt' => [
        'numeric' => 'El campo :attribute debe ser superior a :value.',
        'file' => 'El campo :attribute debe ser superior a :value kilobytes.',
        'string' => 'El campo :attribute debe ser superior a :value characters.',
        'array' => 'El campo :attribute debe de tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El campo :attribute debe ser igual o superior que :value.',
        'file' => 'El campo :attribute debe ser igual o superior a :value kilobytes.',
        'string' => 'El campo :attribute debe ser igual o superior de :value caracteres.',
        'array' => 'El campo :attribute debe tener :value elementos o más.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El :attribute seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El campo :attribute debe de ser un entero.',
    'ip' => 'El campo :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El campo :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El campo :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El campo :attribute debe ser un texto JSON válido.',
    'lt' => [
        'numeric' => 'El campo :attribute debe ser inferior a :value.',
        'file' => 'El campo :attribute debe ser inferior a :value kilobytes.',
        'string' => 'El campo :attribute debe ser inferior a :value caracteres.',
        'array' => 'El campo :attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El campo :attribute must be less than or equal :value.',
        'file' => 'El campo :attribute must be less than or equal :value kilobytes.',
        'string' => 'El campo :attribute must be less than or equal :value characters.',
        'array' => 'El campo :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'file' => 'El campo :attribute no debe ser mayor que :max kilobytes.',
        'string' => 'El campo :attribute no debe ser superior a :max caracteres.',
        'array' => 'El campo :attribute no debe tener más de :max elementos.',
    ],
    'mimes' => 'El campo :attribute debe ser uno de los siguientes tipos: :values.',
    'mimetypes' => 'El campo :attribute debe ser uno de los siguientes tipos: :values.',
    'min' => [
        'numeric' => 'El campo :attribute debe ser al menos de :min.',
        'file' => 'El campo :attribute debe ser al menos de :min kilobytes.',
        'string' => 'El campo :attribute debe tener al menos :min caracteres.',
        'array' => 'El campo :attribute debe de tener al menos :min elementos.',
    ],
    'multiple_of' => 'El campo :attribute debe ser un multiplo de :value.',
    'not_in' => 'El :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => 'El campo :attribute debe ser ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando :values está presente.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los :values son presentes.',
    'prohibited' => 'El campo :attribute es prohibido.',
    'prohibited_if' => 'El campo :attribute es prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute es prohibido a nebis que :other esté en :values.',
    'same' => 'Los campos :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El campo :attribute debe tener un tamaño de :size.',
        'file' => 'El campo :attribute debe tener un tamaño de :size kilobytes.',
        'string' => 'El campo :attribute debe tener un tamaño de :size caracteres.',
        'array' => 'El campo :attribute debe contener :size elementos.',
    ],
    'starts_with' => 'El campo :attribute debe comenzar con uno de los siguientes valores: :values.',
    'string' => 'El campo :attribute debe de ser una cadena de texto.',
    'timezone' => 'El campo :attribute debe ser una zona horaria válida.',
    'unique' => 'El campo :attribute ya existe.',
    'uploaded' => 'El campo :attribute ha fallado en la subida.',
    'url' => 'El campo :attribute no es una URL válida.',
    'uuid' => 'El campo :attribute no es un identificador UUID válido.',

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

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
