<?php

namespace App\Validation;

class CustomRules
{
  protected $error;

  // Rule is to validate mobile number digits
  public function emailSSO(string $str, string $fields, array $data)
  {
    // check apabila ada menggunakan email selain sso uns
    if (preg_match('/^[a-zA-Z0-9.!#$%&’*+\/=?^_`{|}~-]+.uns.ac.id*$/', $data['email'])) {
      return true;
    } else {
      return false;
    }
  }
}
