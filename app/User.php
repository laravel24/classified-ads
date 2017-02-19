<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

  use Notifiable;

  protected $fillable = ['name', 'email', 'password',];
  protected $hidden = ['password', 'remember_token',];

  public function favouriteListings() {
    return $this->morphedByMany(Listing::class, 'favouriteable')
      ->withPivot(['created_at'])
      ->orderByPivot('created_at', 'desc');
  }

  public function viewedListings() {
    return $this->belongsToMany(Listing::class, 'user_listing_views')
      ->withTimestamps()
      ->withPivot(['count', 'id']);
  }

}
