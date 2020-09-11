<?php

require_once('../dbconnect.php');

class UserLogic
{
  /**
   * ユーザ登録
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData)
  {
    $result = false;
    $sql = 'INSERT INTO users(name, email, password) VALUES (?, ?, ?)';

    $arr = [];
    $arr[] = $userData['username'];
    $arr[] = $userData['email'];
    $arr[] = password_hash($userData['passwd'], PASSWORD_DEFAULT);

    try {
      $stmt = connect()->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch (\Exception $e) {
      echo $e;
      return $result;
    }
  }
}