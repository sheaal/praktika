<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class AddBookValidator extends AbstractValidator
{
    protected string $message = 'The :field must be filled and contain only digits';

    public function rule(): bool
    {
        $symbols = '!@#$%^&*()_+}{":?><';
        if(preg_match('/['.$symbols.']/', $this->value)){
            return false;
        }
        return true;
    }
}