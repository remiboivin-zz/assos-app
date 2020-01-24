<?php

/**
*
*/
// namespace Src;
// use PDO;
require_once ('./src/User.php');


class Assos extends User
{
  //    :id, :techno_use, :techno_interest, :is_mentor, :is_mentor_interest, :status, :portfolio, :interests
  private $_description;
  private $_address;
  private $_assosStatus;
  private $_idPage;

  public function __construct(array $datas)
  {
    Parent::__construct($datas);
    $this->hydrate($datas);
  }

  public function hydrate(array $donnees)
  {
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

  public function getDescription() {return $this->_description;}
  public function getAddress() {return $this->_address;}
  public function getIdPage() {return $this->_idPage;}
  public function getAssosStatus() {return $this->_assosStatus;}

  public function getAdminParent() {return Parent::getAdmin();}
  public function getTypeParent() {return Parent::getType();}
  public function getPhoneParent() {return Parent::getPhone();}
  public function getNameParent() {return Parent::getName();}
  public function getMailParent() {return Parent::getMail();}
  public function getStatusParent() {return Parent::getStatus();}

  public function setId($id) {$this->_id = (int)$id;}
  public function setIdPage($idPage) {$this->_idPage = (int)$idPage;}
  public function setStatusAssos($assosStatus) {$this->_assosStatus = (int)$assosStatus;}
  public function setAddress($address) {
    if (is_string($address)) {
      $this->_address = $address;
    }
  }
  public function setDescription($description) {
    if (is_string($description)) {
      $this->_description = $description;
    }
  }
}
?>
