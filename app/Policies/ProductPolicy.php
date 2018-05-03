<?php

namespace VAPOR\Policies;

use VAPOR\User;
use VAPOR\Product;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    public function show(User $user, Product $product)
    {
      // Only a product owner can see it
      return $user->id == $product->user_id;
    }

}
