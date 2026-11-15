<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\RecordComment;

class RecordCommentPolicy extends GarmentPolicy
{
    protected function modelClass(): string
    {
        return RecordComment::class;
    }

    protected function module(): string
    {
        return 'communication';
    }
}
