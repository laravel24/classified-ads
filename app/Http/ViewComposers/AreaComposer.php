<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class AreaComposer {

  private $area;

  public function compose(View $view) {
    if(!$this->area) {
      $this->area = \App\Area::where('slug', session()->get('area', config()->get('fresh.defaults.area')))->first();
    }
    return $view->with('area', $this->area);
  }

}
