<?php

namespace App\Services;

class CheckFormData
{
  public static function checkGender($contact)
  {
    // genderは0~2で格納されているので変換
    if ($contact->gender === 0) {
      $gender = '男性';
    } elseif ($contact->gender === 1) {
      $gender = '女性';
    } else {
      $gender = 'その他';
    }

    return $gender;
  }

  public static function checkAge($contact)
  {
    // 年齢は1~6で格納されているので変換
    switch ($age = $contact->age) {
      case 1:
        $age = '~19歳';
        break;
      case 2:
        $age = '20歳~29歳';
        break;
      case 3:
        $age = '30歳~39歳';
        break;
      case 4:
        $age = '40歳~49歳';
        break;
      case 5:
        $age = '50歳~59歳';
        break;
      case 6:
        $age = '60歳~69歳';
        break;
    }

    return $age;
  }
}