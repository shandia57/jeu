<?php

namespace App\Class\Connection;
use PDO;
  require(dirname(__DIR__) . '../../Page/handleErrors.php');

  class Connection{

      private static $db;

      public static function get(): ?PDO
      {
          $config = require(dirname(__DIR__) . '../../../../config/app.conf.php');
          $config = $config['database'];
          $dsn = $config['connection'];
          $username = $config['username'];
          $password = $config['password'];
          $charset = $config['charset'];

          if (empty(self::$db)){
              self::$db = $dsn.';'.$username.';'.$password.';'.$charset;
              $options = [
                  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                  PDO::ATTR_EMULATE_PREPARES   => false,
              ];
              try{
                  self::$db = new PDO($dsn, $username, $password, $options);
              } catch (\PDOException $e) {
                  error_log(PHP_EOL.$e->getMessage(), 3, "php-errors.log");
                  throw new \PDOException($e->getMessage(), (int)$e->getCode());
              }
          }
          return self::$db;
      }
  }
