<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

use App\Area;

class Category extends Model {

  use NodeTrait;

  protected $fillable = ['name', 'slug'];

  public function getRouteKeyName() {
    return 'slug';
  }

  public function listings() {
    return $this->hasMany(Listing::class);
  }

  public function scopeWithListingsInArea($query, Area $area) {
    return $query->with(['listings' => function($q) use ($area) {
      $q->isLive()->inArea($area);
    }]);
  }

}
