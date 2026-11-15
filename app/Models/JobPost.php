<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use ImranDev\UniversalSlug\Attributes\Slug;
use ImranDev\UniversalSlug\Traits\HasUniversalSlug;

#[Slug(from: 'title', to: 'slug', language: 'bn', skipIfFilled: true)]
class JobPost extends GarmentModel
{
    use HasUniversalSlug;
    protected $table = 'job_posts';

    protected function casts(): array
    {
        return [
            'vacancies' => 'integer',
            'closes_on' => 'date',
            'unit_id' => 'integer',
        ];
    }

    /** @return BelongsTo<Unit, $this> */
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    /** @return BelongsTo<Department, $this> */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    /** @return BelongsTo<Designation, $this> */
    public function designation(): BelongsTo
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
