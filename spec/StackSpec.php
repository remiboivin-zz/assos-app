<?php
require_once('./src/Developer.php');

describe('Stack', function(){
  it('Test getMsg() of Stack class', function () {
    $stack = new Stack(new Exception("Error var technoUse is not string type", 1));
    expect($stack->getMsg())->toBe("Exception: Error var technoUse is not string type ");
  });
  it('Test getFile() of Stack class', function () {
    $stack = new Stack(new Exception("Error var technoUse is not string type", 1));
    expect($stack->getFile())->toBe("var/www/html/assos-symfony/spec/");
  });

  it('Test getMsg() of Stack class', function () {
    $error;
    $faker = Faker\Factory::create();
    try {
      $developer = new Developer([
        'technoUse' => 45,
      ]);
    } catch (Exception $e) {
      $error = $e;
    }
    $stack = new Stack($error);
    expect($stack->getStack())->toBe(" trace:\n#0 /var/www/html/assos-symfony/src/Developer.php(40): Developer->setTechnoUse(45)\n#1 /var/www/html/assos-symfony/src/User.php(20): Developer->hydrate(Array)\n#2 /var/www/html/assos-symfony/src/Developer.php(26): User->__construct(Array)\n#3 /var/www/html/assos-symfony/spec/");
  });
});
?>
