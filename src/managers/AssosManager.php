<?php
/**
*
*/

namespace Src;
use PDO;
require_once ('./src/Assos.php');

class AssosManager
{

  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Assos $assos)
  {
    $q = $this->_db->prepare('INSERT INTO asso(description, address, idPage, assosStatus)
     VALUES(:description, :address, :idPage, :assosStatus)');
    $q->bindValue(':description', $assos->getDescription(), PDO::PARAM_STR);
    $q->bindValue(':address', $assos->getAddress(), PDO::PARAM_STR);
    $q->bindValue(':idPage', $assos->getIdPage(), PDO::PARAM_INT);
    $q->bindValue(':assosStatus', $assos->getAssosStatus(), PDO::PARAM_BOOL);
    $q->execute();
    $q = $this->_db->prepare('INSERT INTO users(name, phone, mail, type, id_type, is_admin, status) VALUES(:name, :phone, :mail, :type, :id_type, :is_admin, :status)');
    $q->bindValue(':name', $assos->getNameParent(), PDO::PARAM_STR );
    $q->bindValue(':phone', $assos->getPhoneParent(), PDO::PARAM_STR );
    $q->bindValue(':mail', $assos->getMailParent(), PDO::PARAM_STR );
    $q->bindValue(':type', $assos->getTypeParent(), PDO::PARAM_INT );
    $q->bindValue(':id_type', $this->_db->lastInsertId(), PDO::PARAM_INT);
    $q->bindValue(':is_admin', $assos->getAdminParent(), PDO::PARAM_BOOL);
    $q->bindValue(':status', $assos->getStatusParent(), PDO::PARAM_INT);
    $q->execute();
  }

  public function delete(User $user)
  {
    $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
  }

  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, name, phone, mail FROM users WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  }

  public function getList()
  {
    $users = [];

    $q = $this->_db->query('SELECT id, name, phone, mail FROM users ORDER BY name');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new User($donnees);
    }

    return $users;
  }

  public function update(Personnage $user)
  {
    $q = $this->_db->prepare('UPDATE users SET name = :name, phone = :phone, mail = :mail WHERE id = :id');

    $q->bindValue(':name', $user->name(), PDO::PARAM_INT);
    $q->bindValue(':phone', $user->phone(), PDO::PARAM_INT);
    $q->bindValue(':mail', $user->mail(), PDO::PARAM_INT);
    $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

}

?>
