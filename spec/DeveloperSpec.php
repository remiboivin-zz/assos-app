<?php
//use Src\Developer;
// use Faker;
// use Exception;
require_once 'vendor/autoload.php';
require_once 'src/Developer.php';
describe('Developer', function(){
  define ("Busy" , 0);
  define ("available" , 1);
  define ("offline" , 2);
  define ("Developer" , 0);
  define ("Association" , 1);
  // beforeEach(function () {
  //   $faker = Faker\Factory::create();
  //   $developer = new Developer([
  //     'name' => $faker->name,
  //     'phone' => $faker->phoneNumber,
  //     'mail' => $faker->freeEmail,
  //     'Type' => Developer,
  //     'admin' => True,
  //     'technoUse' => "PHP;MYSQL;RAILS",
  //     'technoInterest' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';',
  //     'isMentor' => false,
  //     'isMentorInterest' => false,
  //     'status' => offline,
  //     'portfolio' => $faker->url,
  //     'interests' => $faker->words[0].';'.$faker->words[1].';'.$faker->words[2].';'
  //   ]);
  // });

  it('Test Exception  technoUse of Developer class', function () {
    $closure = function () {
      $faker = Faker\Factory::create();
      $developer = new Developer([
        'technoUse' => 0,
      ]);
    };
    expect($closure)->toThrow(new Exception("Error var technoUse is not string type", 1));
  });

  it('Test Exception  technoInterest of Developer class', function () {
    $closure = function () {
      $faker = Faker\Factory::create();
      $developer = new Developer([
        'technoInterest' => 0,
      ]);
    };
    expect($closure)->toThrow(new Exception("Error var technoInterest is not string type", 1));
  });

  it('Test Exception  portfolio of Developer class', function () {
    $closure = function () {
      $faker = Faker\Factory::create();
      $developer = new Developer([
        'portfolio' => 0,
      ]);
    };
    expect($closure)->toThrow(new Exception("Error var portfolio is not string type", 1));
  });

  it('Test Exception  interests of Developer class', function () {
    $closure = function () {
      $faker = Faker\Factory::create();
      $developer = new Developer([
        'interests' => 0,
      ]);
    };
    expect($closure)->toThrow(new Exception("Error var interest is not string type", 1));
  });

  it('Test setter/getter technoUse functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $developer = new Developer([
      'technoUse' => "PHP;MYSQL;RAILS",
    ]);
    $var = $developer->getTechnoUse();
    expect($var)->toBe("PHP;MYSQL;RAILS");
  });

  it('Test setter/getter technoInterest functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $developer = new Developer([
      'technoInterest' => "SYMFONY;ARDUINO;C"
    ]);
    $var = $developer->getTechnoInterest();
    expect($var)->toBe("SYMFONY;ARDUINO;C");
  });

  it('Test setter/getter isMentor functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $developer = new Developer([
      'isMentor' => false
    ]);
    $var = $developer->getIsMentor();
    expect($var)->toBe(false);
  });

  it('Test setter/getter isMentorInterest functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $developer = new Developer([
      'isMentorInterest' => true
    ]);
    $var = $developer->getIsMentorInterest();
    expect($var)->toBe(true);
  });

  it('Test setter/getter portfolio functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $url = $faker->url;
    $developer = new Developer([
      'portfolio' => $url
    ]);
    $var = $developer->getPortfolio();
    expect($var)->toBe($url);
  });

  it('Test setter/getter interests functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $url = $faker->url;
    $developer = new Developer([
      'interests' => "test;test1"
    ]);
    $var = $developer->getInterests();
    expect($var)->toBe("test;test1");
  });

  it('Test setter/getter id functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $url = $faker->url;
    $developer = new Developer([
      'id' => 45
    ]);
    $var = $developer->getIds();
    expect($var)->toBe(45);
  });

  //  public function getMsgError() {return $this->_msgErrors;}
  it('Test setter/getter msgError functions of Developer class', function () {
    $datas = [];
    $developer = new Developer($datas);
    try {
      $developer->setPortfolio(45);
    } catch (Exception $e) {
      $developer->setMsgError($e->getMessage());
    }
    $var = $developer->getMsgError();
    expect($var)->toBe("Error var portfolio is not string type");
  });

  // public function getIdParent() {return Parent::getId();}
  // public function getStatusParent() {return Parent::getStatus();}
  it('Test setter/getter StatusParent functions of Developer class', function () {
    $developer = new Developer([
      'status' => available
    ]);
    $var = $developer->getStatusParent();
    expect($var)->toBe(available);
  });

  // // public function getAdminParent() {return Parent::getAdmin();}
  it('Test setter/getter AdminParent functions of Developer class', function () {
    $developer = new Developer([
      'admin' => true
    ]);
    $var = $developer->getAdminParent();
    expect($var)->toBe(true);
  });

  // // public function getTypeParent() {return Parent::getType();}
  it('Test setter/getter typeParent functions of Developer class', function () {
    $developer = new Developer([
      'type' => Developer
    ]);
    $var = $developer->getTypeParent();
    expect($var)->toBe(Developer);
  });

  // // public function getPhoneParent() {return Parent::getPhone();}
  it('Test setter/getter phoneParent functions of Developer class', function () {
    $datas = [];
    $developer = new Developer([
      'phone' => "06-60-43-77-22"
    ]);
    $var = $developer->getPhoneParent();
    expect($var)->toBe("06-60-43-77-22");
  });
  // public function getNameParent() {return Parent::getName();}
  it('Test setter/getter nameParent functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $name = $faker->name;
    $developer = new Developer([
      'name' => $name
    ]);
    $var = $developer->getNameParent();
    expect($var)->toBe($name);
  });
  // public function getNameParent() {return Parent::getName();}
  it('Test setter/getter mailParent functions of Developer class', function () {
    $faker = Faker\Factory::create();
    $email = $faker->freeEmail;
    $developer = new Developer([
      'mail' => $email
    ]);
    $var = $developer->getMailParent();
    expect($var)->toBe($email);
  });
});
?>
