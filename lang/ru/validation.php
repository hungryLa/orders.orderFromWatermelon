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
    'accepted'             => 'Вы должны принять ":attribute".',
    'active_url'           => 'Поле ":attribute" is not a valid URL.',
    'after'                => 'Поле ":attribute" должно быть датой после :date.',
    'after_or_equal'       => 'Поле ":attribute" должно быть датой после или равной :date.',
    'alpha'                => 'Поле ":attribute" может содержать только буквы.',
    'alpha_dash'           => 'Поле ":attribute" может содержать только буквы, цифры, дефис и подчеркивание.',
    'alpha_num'            => 'Поле ":attribute" может содержать только буквы и цифры.',
    'array'                => 'Поле ":attribute" должно быть массивом.',
    'before'               => 'Поле ":attribute" должно быть датой перед :date.',
    'before_or_equal'      => 'Поле ":attribute" должно быть датой перед или равной :date.',
    'between' => [
        'numeric' => 'Поле ":attribute" должно быть между :min и :max.',
        'file'    => 'Размер ":attribute" должен быть от :min до :max килобайт.',
        'string'  => 'Длина ":attribute" должна быть от :min до :max символов.',
        'array'   => 'Поле ":attribute" должно содержать :min - :max элементов.',
    ],
    'boolean'              => 'Поле ":attribute" должно быть логической истинной или ложью.',
    'credentials'          => 'Введённые данные не соответствуют нашим записям.',
    'confirmed'            => 'Поле ":attribute" не совпадает с подтверждением.',
    'current_password'     => 'Не совпадает с текущим паролем.',
    'date'                 => 'Поле ":attribute" не является датой.',
    'date_format'          => 'Поле ":attribute" не соответствует формату :format.',
    'different'            => 'Поля ":attribute" и :other должны различаться.',
    'digits'               => 'Длина цифрового поля ":attribute" должна быть :digits.',
    'digits_between'       => 'Длина цифрового поля ":attribute" должна быть между :min и :max.',
    'dimensions'           => 'Поле ":attribute" имеет недопустимые размеры изображения.',
    'distinct'             => 'Поле ":attribute" имеет повторяющееся зачение.',
    'email'                => 'Поле ":attribute" должно быть действительным электронным адресом.',
    'exists'               => 'Выбранное значение для ":attribute" некорректно.',
    'file'                 => 'Поле ":attribute" должно быть файлом.',
    'filled'               => 'Поле ":attribute" обязательно для заполнения.',
    'image'                => 'Поле ":attribute" должно быть изображением.',
    'in'                   => 'Выбранное значение для ":attribute" ошибочно.',
    'in_array'             => 'Поле ":attribute" не существует в :other.',
    'integer'              => 'Поле ":attribute" должно быть целым числом.',
    'ip'                   => 'Поле ":attribute" должно быть действительным IP-адресом.',
    'ipv4'                 => 'Поле ":attribute" должно быть действительным IPv4-адресом.',
    'ipv6'                 => 'Поле ":attribute" должно быть действительным IPv6-адресом.',
    'json'                 => 'Поле ":attribute" должно быть валидной JSON строкой.',
    'max'                  => [
        'numeric' => 'Поле ":attribute" должно быть не больше :max.',
        'file'    => 'Поле ":attribute" должно быть не больше :max Килобайт.',
        'string'  => 'Поле ":attribute" должно быть не длиннее :max символов.',
        'array'   => 'Поле ":attribute" должно содержать не более :max элементов.',
    ],
    'mimes'                => 'Поле ":attribute" должно быть файлом одного из типов: :values.',
    'mimetypes'            => 'Поле ":attribute" должно быть файлом одного из типов: :values.',
    'min'                  => [
        'numeric' => 'Поле ":attribute" должно быть не менее :min.',
        'file'    => 'Поле ":attribute" должно быть не менее :min Килобайт.',
        'string'  => 'Поле ":attribute" должно быть не короче :min символов.',
        'array'   => 'Поле ":attribute" должно содержать не менее :min элементов.'
    ],
    'not_in'               => 'Выбранное значение для ":attribute" ошибочно.',
    'numeric'              => 'Поле ":attribute" должно быть числом.',
    'present'              => 'Поле ":attribute" должно присутствовать.',
    'regex'                => 'Поле ":attribute" имеет ошибочный формат.',
    'required'             => 'Поле ":attribute" обязательно для заполнения.',
    'required_if'          => 'Поле ":attribute" обязательно для заполнения, когда :other равно :value.',
    'required_unless'      => 'Поле ":attribute" обязательно для заполнения, когда :other не равно :values.',
    'required_with'        => 'Поле ":attribute" обязательно для заполнения, когда :values указано.',
    'required_with_all'    => 'Поле ":attribute" обязательно для заполнения, когда :values указаны.',
    'required_without'     => 'Поле ":attribute" обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле ":attribute" обязательно для заполнения, когда :values не указаны.',
    'same'                 => 'Значение ":attribute" должно совпадать с ":other".',
    'size'                 => [
        'numeric' => 'Поле ":attribute" должно быть :size.',
        'file'    => 'Поле ":attribute" должно быть :size Килобайт.',
        'string'  => 'Поле ":attribute" должно быть длиной :size символов.',
        'array'   => 'Количество элементов в поле ":attribute" должно быть :size.'
    ],
    'string'               => 'Поле ":attribute" должно быть строкой.',
    'timezone'             => 'Поле ":attribute" должнобыть валидной временной зоной.',
    'unique'               => 'Такое значение поля ":attribute" уже существует.',
    'uploaded'             => 'Загрузка поля ":attribute" не удалась.',
    'url'                  => 'Поле ":attribute" имеет ошибочный формат.',

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
        'files'=>[
            'required' => __('form.You have not selected a file'),
        ],
        'files.*'=>[
            'image' => __('form.The file(s) are not an image'),
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'role' => __('form.Role'),
        'first_name' => __('form.Name'),
        'middle_name' => __('form.Middle name'),
        'last_name' => __('form.Last name'),
        'email' => __('form.Email'),
        'password' => __('form.Password'),
        'password_confirmation' => __('form.Confirm password'),
        'password_old' => __('form.Old password'),
        'password_new' => __('form.New password'),
        'title' => __('form.Title'),
        'status' => __('form.Status'),
        'type' => __('form.Type of order'),
        'description' => __('form.Description'),
        'address' => __('form.Address'),
        'phone_number' => __('form.Phone number'),
        'gender' => __('form.Gender'),
        'user' => __('other.Users'),
        'family_category' => __('form.Family category'),
        'special_category' => __('form.Special category'),
        'patient' => __('other.Patient'),
        'date_time' => __('other.Date and time of reception'),
        'theme' => __('form.Theme'),
        'recommendation' => __('form.Recommendation'),
        'application_classifier' => __('form.Application code'),
        'comment' => __('form.Comment'),
        'form_event' => __('form.Form event'),
        'count_participants' => __('form.Count participants'),
        'leader' => __('other.Leader'),
        'number_seats' => __('form.Number of seats'),
        'date' => __('form.Date'),
        'branch' => __('other.Branch'),
        'chapter' => __('form.Chapter'),
        'contents' => __('form.Contents'),
        'answer' => __('form.Answer'),
        'direction' => __('form.Direction'),
        'category' => __('form.Category'),
        'city' => __('form.City'),
        'full_name' => __('form.Full name'),
        'birthday' => __('form.Birthday'),
        'consent_received' => __('form.Consent received'),
        'free' => __('other.free'),
        'type_which' => __('other.Type of reception'),
        'event' => __('other.Event'),
        'code' => __('form.Code'),
        'price' => __('form.Price'),
    ],

];
