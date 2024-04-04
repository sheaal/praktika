<?php

namespace Validators;

class BookDistributionValidator
{
    public function rule(array $data): array
    {
        $errors = [];

        if (!isset($data['date_issue']) || empty($data['date_issue'])) {
            $errors['date_issue'] = 'Поле "Дата выдачи" пусто';
        }

        if (!isset($data['return_date']) || empty($data['return_date'])) {
            $errors['return_date'] = 'Поле "Дата возврата" пусто';
        }

        if (isset($data['date_issue']) && isset($data['return_date'])) {
            $dateIssue = strtotime($data['date_issue']);
            $returnDate = strtotime($data['return_date']);

            if ($dateIssue > $returnDate) {
                $errors['date_issue'] = 'Дата выдачи не может быть позже даты возврата';
            }
        }

        return $errors;
    }
}