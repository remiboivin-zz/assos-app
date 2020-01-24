<?php
require_once('./src/managers/DeveloperManager.php');

describe('DeveloperManager', function(){
  // public function add(Developer $developer)
  function test($developer) {
    $i = 0;
    $db = new PDO('mysql:host=localhost;dbname=app_assos', 'root', 'bo81re47&*', array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      $list = new Developer([]);
      try {
        $db = new PDO('mysql:host=localhost;dbname=app_assos', 'root', 'bo81re47&*', array(
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          $manager = new DeveloperManager($db);
          $manager->add($developer);
          $list = $manager->get($db->lastInsertId());
        } catch (Exception $e) {
          $error[$i] = $e;
          echo $e;
        } finally {
          return $list;
        }
      }
      it('Test add() of DeveloperManager class', function () {

        $faker = Faker\Factory::create();
        $url = $faker->url;
        $developer = new Developer([
          'name' => $faker->name,
          'phone' => "06-73-90-92-26",
          'mail' => $faker->freeEmail,
          'Type' => Developer,
          'admin' => True,
          'technoUse' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';',
          'technoInterest' => "[PHP];[SYMFONY];[NODEJS];[RAILS];",
          'isMentor' => false,
          'isMentorInterest' => false,
          'status' => offline,
          'portfolio' => $url,
          'interests' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';'
        ]);
        $list = test($developer);
        expect($list->getIds())->not->toBe(null);
      });

      // // public function delete(User $user)
      it('Test delete() of DeveloperManager class', function () {
        $closure = function () {
          $faker = Faker\Factory::create();
          $url = $faker->url;
          $developer = new Developer([
            'name' => $faker->name,
            'phone' => "06-73-90-92-26",
            'mail' => $faker->freeEmail,
            'Type' => Developer,
            'admin' => True,
            'id' => 3,
            'technoUse' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';',
            'technoInterest' => "[PHP];[SYMFONY];[NODEJS];[RAILS];",
            'isMentor' => false,
            'isMentorInterest' => false,
            'status' => offline,
            'portfolio' => $url,
            'interests' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';'
          ]);
          $db = new PDO('mysql:host=localhost;dbname=app_assos', 'root', 'bo81re47&*', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $manager = new DeveloperManager($db);
            $manager->delete($developer);
            $manager->get(1);
        };
          expect($closure)->toThrow("Argument 1 passed to User::__construct() must be of the type array, bool given, called in /var/www/html/assos-symfony/src/Developer.php on line 26");
        });

        // // public function update(Personnage $user)
        // it('Test delete() of Stack class', function () {
        //   $stack = new Stack(new Exception("Error var technoUse is not string type", 1));
        //   expect($stack->getMsg())->toBe("Exception: Error var technoUse is not string type ");
        // });
        // // public function setDb(PDO $db)
        // it('Test delete() of Stack class', function () {
        //   $stack = new Stack(new Exception("Error var technoUse is not string type", 1));
        //   expect($stack->getMsg())->toBe("Exception: Error var technoUse is not string type ");
        // });
      });
      ?>
