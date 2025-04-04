<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Offer;
use phpDocumentor\Reflection\Types\Boolean;

class OfferPolicy
{
    /**
     * Create a new policy instance.
     */
    public function editoffer(User $user, Offer $offer): Bool
    {
        return $offer->admin->user->is($user);
    }
        
}
