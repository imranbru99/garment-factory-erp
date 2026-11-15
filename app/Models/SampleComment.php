<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SampleComment extends GarmentModel
{
    protected $table = 'sample_comments';

    /** @return BelongsTo<SampleRequest, $this> */
    public function sampleRequest(): BelongsTo
    {
        return $this->belongsTo(SampleRequest::class, 'sample_request_id');
    }
    /** @return BelongsTo<User, $this> */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
