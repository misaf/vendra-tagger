<?php

declare(strict_types=1);

namespace Misaf\VendraTagger\Models;

use Illuminate\Database\Eloquent\Attributes\Hidden;
use Misaf\VendraTenant\Traits\BelongsToTenant;
use Spatie\Tags\Tag as SpatieTag;

/**
 * Misaf\VendraTagger\Models\Tagger.
 *
 * @property int $tenant_id
 */
#[Hidden(['tenant_id'])]
final class Tagger extends SpatieTag
{
    use BelongsToTenant;

    protected $table = 'tags';

    protected function casts(): array
    {
        return [
            'tenant_id' => 'integer',
            ...parent::casts(),
        ];
    }
}
