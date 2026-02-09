<?php

declare(strict_types=1);

namespace Misaf\VendraTagger\Models;

use Misaf\VendraTenant\Traits\BelongsToTenant;
use Spatie\Tags\Tag as SpatieTag;

/**
 * Misaf\VendraTagger\Models\Tagger.
 *
 * @property int $tenant_id
 */
final class Tagger extends SpatieTag
{
    use BelongsToTenant;

    protected $table = 'tags';

    protected $hidden = [
        'tenant_id',
    ];

    protected function casts(): array
    {
        return [
            'tenant_id' => 'integer',
            ...parent::casts(),
        ];
    }
}
