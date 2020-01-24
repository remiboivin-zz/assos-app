<?php
/**
 *
 */
class Stack
{
  private $_msg;
  private $_file;
  private $_stack;
  function __construct($donnees)
  {
    $this->hydrate($donnees);
  }

  public function hydrate($value)
  {
    $donnees = array(
      'msg' => explode('in /', $value)[0],
      'file' => explode('Stack', explode('in /', $value)[1])[0],
      'stack' => explode('Stack', explode('in /', $value)[1])[1]
      );
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

  public function getMsg() {return $this->_msg;}
  public function getFile() {return $this->_file;}
  public function getStack() {return $this->_stack;}

  public function setMsg($Msg) {
    if (is_string($Msg)) {
      $this->_msg = $Msg;
    } else {
      throw new \Exception("Error Msg is not a string type", 1);
    }
  }
  public function setFile($File) {
    if (is_string($File)) {
      $this->_file = $File;
    } else {
      throw new \Exception("Error File is not a string type", 1);
    }
  }
  public function setStack($Stack) {
    if (is_string($Stack)) {
      $this->_stack = $Stack;
    } else {
      throw new \Exception("Error stack is not a string type", 1);
    }
  }
}
?>
