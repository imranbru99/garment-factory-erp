<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\LetterOfCredit;

class LetterOfCreditPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return LetterOfCredit::class;
    }

    protected function module(): string
    {
        return 'commercial';
    }
}
