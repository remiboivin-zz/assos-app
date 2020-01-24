<?php
/**
*
*/

// namespace Src;

abstract class User
{
  private $_name;
  private $_phone;
  private $_mail;
  private $_type;
  private $_idType;
  private $_admin;
  private $_status;

  function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    print('$method');
    foreach ($donnees as $key => $value)
    {
      // On récupère le nom du setter correspondant à l'attribut.
      $method = 'set'.ucfirst($key);

      // Si le setter correspondant existe.
      if (method_exists($this, $method))
      {
        // On appelle le setter.
        $this->$method($value);
      }
    }
  }

  public function getAdmin() {return $this->_admin;}
  public function getType() {return $this->_type;}
  public function getStatus() {return $this->_status;}
  public function getPhone() {return $this->_phone;}
  public function getName() {return $this->_name;}
  public function getMail() {return $this->_mail;}

  public function setStatus($status) {$this->_status = (int)$status;}
  public function setType($type) {$this->_type = (int)$type;}
  public function setIdType($idType) {$this->_idType = (int)$idtype;}
  public function setPhone($phone) {
    if (is_string($phone) and strlen($phone) <= 14) {
      $this->_phone = $phone;
    } else {
      throw new \Exception("Error phone is too big. Please enter a number who contains les than 14 characters to continue", 1);
    }
  }
  public function setAdmin($admin) {
    if (is_bool($admin)) {
      $this->_admin = $admin;
    } else {
      throw new \Exception("Error $admin is not bool type", 1);
    }
  }
  public function setName($name) {
    if (is_string($name))
    {
      $this->_name = $name;
    }  else {
      throw new \Exception("Error name is not a valid string. Please enter a valid string  to continue", 1);
    }
  }
  public function setMail($mail) {
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $this->_mail = $mail;
    }  else {
      throw new \Exception("Error email is not a valid email. Please enter a valid email to continue", 1);
    }
  }
}
?>
