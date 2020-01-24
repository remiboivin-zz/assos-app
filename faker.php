<?php

define ("Busy" , 0);
define ("available" , 1);
define ("offline" , 2);
define ("Association" , 1);
require_once 'vendor/autoload.php';
require_once ('./src/managers/AssosManager.php');
  for ($i = 0; $i < 10; $i++) {
    try {
      $assos = new Assos([
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'mail' => $faker->freeEmail,
        'Type' => Association,
        'admin' => True,
        'status' => offline,
        'description' => $faker->text,
        'address' => $faker->address,
        'statusAssos' => true,

      ]);
      $db = new PDO('mysql:host=localhost;dbname=app_assos', 'root', 'bo81re47&*');
      //$manager = new AssosManager($db);
      //$manager->add($assos);
    } catch (Exception $e) {
      $error[$i] = $e;
    }
  }
  ?>
