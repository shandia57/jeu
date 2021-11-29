<?php

namespace App\Classes;

  use Exception;
  use PDO;

  class Connection {

      private string $dsn;
      private string $username;
      private string $password;
      private static $db;

      /**
       * Connection constructor.
       * @param string $dsn
       * @param string $username
       * @param string $password
       */
      public function __construct(string $dsn, string $username, string $password)
      {
          $this->dsn = $dsn;
          $this->username = $username;
          $this->password = $password;
      }

      public static function get(): PDO
      {
          $config = require(dirname(__DIR__) . '/../../config/app.conf.php');
          $config = $config['database'];
          $dsn = $config['connection'];
          $username = $config['username'];
          $password = $config['password'];

          if (empty(self::$db)){
              try{
                  self::$db = new PDO($dsn,$username,$password);
              } catch(Exception  $e){
                  echo $e->getMessage();
              }

          }
          return self::$db;
      }
  }
