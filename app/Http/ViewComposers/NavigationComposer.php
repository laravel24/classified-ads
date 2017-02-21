<?php

namespace App\Http\ViewComposers;

use Auth;
use Illuminate\View\View;

class NavigationComposer {

  public function compose(View $view) {
    if(!Auth::check()) {
      return $view;
    }

    $user = Auth::user();
    $listings = $user->listings();

    return $view->with([
      'unpublishedListingsCount' => $listings->where('live', false)->count(),
      'publishedListingsCount' => $listings->where('live', true)->count()
    ]);
  }

}
