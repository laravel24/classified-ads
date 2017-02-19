<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingContactFormRequest extends FormRequest {

  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'message' => 'required'
    ];
  }

  public function messages() {
    return [
      'message.required' => 'You need to enter a message'
    ];
  }

}
