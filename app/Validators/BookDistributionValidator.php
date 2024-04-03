<?php

namespace Validators;

use Illuminate\Database\Capsule\Manager as Capsule;
use Src\Validator\AbstractValidator;

class BookDistributionValidator extends AbstractValidator
{
    protected string $message = '...';

    public function rule(): bool
    {
        $data = json_decode($this->value, true);
        $dateIssue = strtotime($this->$data['date_issue']);
        $returnDate = strtotime($this->$data['return_date']);

        return $dateIssue <= $returnDate;
    }

}