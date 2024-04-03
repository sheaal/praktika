<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class AddreaderValidator extends AbstractValidator
{
    protected string $message = 'The :field must not contain digits';
    public function rule(): bool
    {
        return !preg_match('/\d/', $this->value);
//        return preg_match('/^[0-9]{11}$/', $value) && !preg_match('/[a-zA-Z]/', $value);
    }
    protected array $rules = [
        'surname' => ['required', 'alpha'],
        'name' => ['required', 'alpha'],
        'patronymic' => ['alpha_num'],
        'gender' => ['in:male,female'],
        'phone' => ['regex:/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/']
    ];
}