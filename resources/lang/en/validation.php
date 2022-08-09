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

    'accepted' => 'The :attribute must be accepted.',
    'accepted_if' => 'The :attribute must be accepted when :other is :value.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'حقل :attribute يجب أن يكون بعد تاريخ :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'حقل :attribute يجب أن يكون حروفا فقط.',
    'alpha_dash' => 'The :attribute must only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute must only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'حقل :attribute يجب أن يكون بين قيمتي :min و :max.',
        'file' => 'حقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'string' => 'حقل :attribute يجب أن يكون بين قيمتي :min و :max حرف.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'حقل :attribute غير مناسب.',
    'current_password' => 'The password is incorrect.',
    'date' => 'حقل :attribute غير صحيح.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'declined' => 'The :attribute must be declined.',
    'declined_if' => 'The :attribute must be declined when :other is :value.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'حقل :attribute يجب أن يكون :digits رقما.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'حقل :attribute يجب أن يكون بريد إلكتروني صحيح.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من أو يساوي :value.',
        'file' => 'The :attribute must be greater than or equal to :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal to :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'حقل :attribute يجب أن يكون صورة.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'حقل :attribute يجب أن يكون أقل من :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'حقل :attribute يجب أن يكون أقل من أو يساوي :value.',
        'file' => 'The :attribute must be less than or equal to :value kilobytes.',
        'string' => 'The :attribute must be less than or equal to :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'mac_address' => 'The :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => 'حقل :attribute يجب ألا يكون أكبر من :max.',
        'file' => 'The :attribute must not be greater than :max kilobytes.',
        'string' => 'The :attribute must not be greater than :max characters.',
        'array' => 'The :attribute must not have more than :max items.',
    ],
    'mimes' => 'حقل :attribute يجب أن يكون من نوع: :values.',
    'mimetypes' => 'حقل :attribute يجب أن يكون من نوع: :values.',
    'min' => [
        'numeric' => 'حقل :attribute يجب أن يكون :min أرقام على الأقل.',
        'file' => 'حقل :attribute يجب ألا يقل عن :min كيلوبايت.',
        'string' => 'حقل :attribute يجب ألا يقل عن :min رمزا.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'حقل :attribute يجب أن يكون رقما.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'حقل :attribute يجب أن يكون :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'حقل :attribute يجب أن يكون :size أحرف.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid timezone.',
    'unique' => 'حقل :attribute محجوز بالفعل.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute must be a valid URL.',
    'uuid' => 'The :attribute must be a valid UUID.',

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

    'attributes' => [
        // REGISTER
        'email' => 'البريد الإلكتروني',
        'password' => 'كلمة السر',
        'password_confirmation' => 'تأكيد كلمة السر',
        'phone_number' => 'رقم الهاتف',
        'profile_pic' => 'الصورة الشخصية',
        'gender' => 'النوع',
        'city' => 'المحافظة',
        'national_id_first_pic' => 'الوجه الأمامي للرقم القومي',
        'national_id_second_pic' => 'الوجه الخلفي للرقم القومي',
        'role' => 'نوع المستخدم',
        'role' => 'نوع المستخدم',

        // POSTS
        'title' => 'العنوان',
        'description' => 'الوصف',
        'from' => 'من',
        'to' => 'إلى',
        'deliver_price' => 'سعر التوصيل',
        'product_id' => 'المنتج',

        //Comments
        'today' => 'اليوم',
        'delivery date' => 'تاريخ التوصيل',


        // PRODUCTS
        'name' => 'الاسم',
        'price' => 'السعر',
        'weight' => 'الوزن',
        'quantity' => 'الكمية',
        'category_id' => 'التصنيف',
        'product_pic' => 'صورة المنتج',



        // CLIENTS
        'adress' => 'العنوان',


        'description' => 'الوصف',
        'description' => 'الوصف',


        'yesterday' => 'الأمس',
        'delivery date' => 'تاريخ التسليم',


        'is_admin' => 'أدمن'
    ],

];
