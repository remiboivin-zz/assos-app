<?php
require('./src/managers/DeveloperManager.php');

// private $_id;
// private $_name;
// private $_phone;
// private $_mail;
// private $_idType;
define ("Developer" , 0);
define ("association" , 1);
//    :id, :techno_use, :techno_interest, :is_mentor, :is_mentor_interest, :status, :portfolio, :interests

$developer = new Developer([
  'id' => 0,
  'name' => 'Victor',
  'phone' => 0,
  'mail' => 'remi.boivin@epitech.eu',
  'idType' => Developer,
  'admin' => false,
  'ids' => 30,
  'technoUse' => "PHP;RAILS;JS;HTML",
  'technoInterest' => "Django;NODEJS",
  'isMentor' => false,
  'isMentorInterest' => false,
  'status' => available,
  'portfolio' => "TEst",
  'interests' => "Read;Write"
]);

$db = new PDO('mysql:host=localhost;dbname=app_assos', 'root', 'bo81re47&*');
$manager = new DeveloperManager($db);
$manager->add($developer);
?>
