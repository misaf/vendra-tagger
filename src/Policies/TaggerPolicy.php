<?php

declare(strict_types=1);

namespace Misaf\VendraTagger\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Misaf\VendraTagger\Enums\TaggerPolicyEnum;
use Misaf\VendraTagger\Models\Tagger;
use Misaf\VendraUser\Models\User;

final class TaggerPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::CREATE);
    }

    public function delete(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::DELETE);
    }

    public function deleteAny(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::DELETE_ANY);
    }

    public function forceDelete(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::FORCE_DELETE);
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::FORCE_DELETE_ANY);
    }

    public function reorder(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::REORDER);
    }

    public function replicate(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::REPLICATE);
    }

    public function restore(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::RESTORE);
    }

    public function restoreAny(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::RESTORE_ANY);
    }

    public function update(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::UPDATE);
    }

    public function view(User $user, Tagger $tagger): bool
    {
        return $user->can(TaggerPolicyEnum::VIEW);
    }

    public function viewAny(User $user): bool
    {
        return $user->can(TaggerPolicyEnum::VIEW_ANY);
    }
}
