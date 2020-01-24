<?php
// namespace Src;
/**
*
*/

require_once ('./src/User.php');
require('./src/Exceptions.php');

class Developer extends User
{
  //    :id, :techno_use, :techno_interest, :is_mentor, :is_mentor_interest, :status, :portfolio, :interests
  private $_id;
  private $_technoUse;
  private $_technoInterest;
  private $_isMentor;
  private $_isMentorInterest;
  private $_status;
  private $_portfolio;
  private $_interests;
  private $_msgErrors;
  private $_codeErrors;

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

  public function getIds() {return $this->_id;}
  public function getTechnoUse() {return $this->_technoUse;}
  public function getTechnoInterest() {return $this->_technoInterest;}
  public function getIsMentor() {return $this->_isMentor;}
  public function getIsMentorInterest() {return $this->_isMentorInterest;}
  public function getPortfolio() {return $this->_portfolio;}
  public function getInterests() {return $this->_interests;}
  public function getMsgError() {return $this->_msgErrors;}

  public function getStatusParent() {return Parent::getStatus();}
  public function getAdminParent() {return Parent::getAdmin();}
  public function getTypeParent() {return Parent::getType();}
  public function getPhoneParent() {return Parent::getPhone();}
  public function getNameParent() {return Parent::getName();}
  public function getMailParent() {return Parent::getMail();}

  public function setId($id) {$this->_id = (int)$id;}
  public function setIsMentor($isMentor) {$this->_isMentor = (bool)$isMentor;}
  public function setIsMentorInterest($isMentorInterest) {$this->_isMentorInterest = (bool)$isMentorInterest;}

  public function setTechnoUse($technoUse) {
    if (is_string($technoUse))
    {
      $this->_technoUse = $technoUse;
    } else {
      throw new \Exception("Error var technoUse is not string type", 1);
    }
  }
  public function setMsgError(String $MsgError) {
    $this->_msgErrors = $MsgError;
  }
  public function setTechnoInterest($technoInterest) {
    if (is_string($technoInterest))
    {
      $this->_technoInterest = $technoInterest;
    } else {
      throw new \Exception("Error var technoInterest is not string type", 1);
    }
  }

  public function setInterests($interest) {
    if (is_string($interest))
    {
      $this->_interests = $interest;
    }  else {
      throw new \Exception("Error var interest is not string type", 1);
    }
  }
  public function setPortfolio($portfolio) {
    if (is_string($portfolio))
    {
      $this->_portfolio = $portfolio;
    }  else {
      throw new \Exception("Error var portfolio is not string type", 1);
    }
  }
}
?>
