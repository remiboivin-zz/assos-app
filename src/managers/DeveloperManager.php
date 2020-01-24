<?php
/**
*
*/
require('./src/Developer.php');

class DeveloperManager
{

  private $_db; // Instance de PDO

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add(Developer $developer)
  {
    $error = [];
    try {
      $q = $this->_db->prepare('INSERT INTO developers(techno_use, techno_interest, is_mentor, is_mentor_interest, portfolio, interests)
      VALUES(:techno_use, :techno_interest, :is_mentor, :is_mentor_interest, :portfolio, :interests)');
      $q->bindValue(':techno_use', $developer->getTechnoUse(), PDO::PARAM_STR);
      $q->bindValue(':techno_interest', $developer->getTechnoInterest(), PDO::PARAM_STR);
      $q->bindValue(':is_mentor', $developer->getIsMentor(), PDO::PARAM_BOOL);
      $q->bindValue(':is_mentor_interest', $developer->getIsMentorInterest(), PDO::PARAM_BOOL);
      $q->bindValue(':portfolio', $developer->getPortfolio(), PDO::PARAM_STR);
      $q->bindValue(':interests', $developer->getInterests(), PDO::PARAM_STR);
      $q->execute();
      $q = $this->_db->prepare('INSERT INTO users(name, phone, mail, type, id_type, is_admin, status) VALUES(:name, :phone, :mail, :type, :id_type, :is_admin, :status)');
      $q->bindValue(':name', $developer->getNameParent(), PDO::PARAM_STR );
      $q->bindValue(':phone', $developer->getPhoneParent(), PDO::PARAM_STR );
      $q->bindValue(':mail', $developer->getMailParent(), PDO::PARAM_STR );
      $q->bindValue(':type', $developer->getTypeParent(), PDO::PARAM_INT );
      $q->bindValue(':id_type', $this->_db->lastInsertId(), PDO::PARAM_INT);
      $q->bindValue(':is_admin', $developer->getAdminParent(), PDO::PARAM_BOOL);
      $q->bindValue(':status', $developer->getStatusParent(), PDO::PARAM_INT);
      $q->execute();
    } catch(PDOException $e)
    {
      $error = $e;
    }
    foreach ($error as $key => $value) {
      echo('<b style="color:red">Message:</b> '.$value[2].'<br/>');
    }
  }

  public function delete(Developer $user)
  {
    $this->_db->exec('DELETE FROM developers WHERE id = '.$user->getIds());
    $this->_db->exec('DELETE FROM users WHERE id_type = '.$user->getIds());
  }

  public function get($id)
  {
    $id = (int) $id;
    $q = $this->_db->query('SELECT id, techno_use, techno_interest, is_mentor, is_mentor_interest, portfolio, interests FROM developers WHERE id = '.$id);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new Developer($donnees);
  }

  public function getList()
  {
    $users = [];

    $q = $this->_db->query('SELECT id, techno_use, techno_interest, is_mentor, is_mentor_interest, portfolio, interests FROM developers ORDER BY id');

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $users[] = new Developer($donnees);
    }

    return $users;
  }

  public function update(Developer $user)
  {
    $q = $this->_db->prepare('UPDATE developers SET techno_use= :techno_use, techno_interest= :techno_interest, is_mentor=:is_mentor, is_mentor_interest= :is_mentor_interest, portfolio= :portfolio, interests= :interests WHERE id = :id');
    $q->bindValue(':techno_use', $user->getTechnoUse(), PDO::PARAM_STR);
    $q->bindValue(':techno_interest', $user->getTechnoInterest(), PDO::PARAM_STR);
    $q->bindValue(':is_mentor', $user->getIsMentor(), PDO::PARAM_BOOL);
    $q->bindValue(':is_mentor_interest', $user->getIsMentorInterest(), PDO::PARAM_BOOL);
    $q->bindValue(':portfolio', $user->getPortfolio(), PDO::PARAM_STR);
    $q->bindValue(':interests', $user->getInterests(), PDO::PARAM_STR);
    $q->bindValue(':id', $user->getIds(), PDO::PARAM_INT);
    $q->execute();

    $q = $this->_db->prepare('UPDATE users SET name = :name, phone = :phone, mail = :mail WHERE id_type = :id_type');
    $q->bindValue(':name', $user->getNameParent(), PDO::PARAM_STR);
    $q->bindValue(':phone', $user->getPhoneParent(), PDO::PARAM_STR);
    $q->bindValue(':mail', $user->getMailParent(), PDO::PARAM_STR);
    $q->bindValue(':id_type', $user->getIds(), PDO::PARAM_INT);
    $q->execute();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

}

?>
