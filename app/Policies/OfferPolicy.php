<?php

namespace App\Policies;

use App\constants\Role;
use App\Models\User;
use App\Models\Offer;

class OfferPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function create(User $user)
    {
        return $user->role==Role::ADMIN || $user->role==Role::USER;
    }
    public function update(User $user, Offer $offer)
    {
        return $user->role==Role::ADMIN || ($user->role == Role::USER && $user->id==$offer->author_id);
    }
    public function myOffer(User $user)
    {
        return $user->role==Role::USER;
    }
}
