<?php
  $dsn = "mysql:host=dbmysql;dbname=teste";
  $dbuser = "dev";
  $dbpass = "dev123";


  try{
      $pdo = new PDO($dsn,$dbuser, $dbpass);
      echo "Conectado!";
  }catch (PDOException $e){
      echo $e->getMessage();
  }