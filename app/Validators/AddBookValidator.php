<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class AddBookValidator extends AbstractValidator
{
    protected string $message = 'The :field must be filled and unique';


    public function rule(): bool
    {

        $book = Capsule::table('books')
            ->where('title', $this->value)
            ->where('id_author', $this->args[0])
            ->where('annotation', $this->args[1])
            ->count();

        return $book === 0 && !empty($this->value);
    }
}