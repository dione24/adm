<?php

namespace Library\Models;


class UsersManagerPDO extends UsersManager
{

    public function login($login, $Password)
    {
        $requete = $this->dao->prepare("SELECT *  FROM users WHERE login=:login");
        $requete->bindValue(':login', $login, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        if (password_verify($_POST['password'], $resultat['password'])) {

            return $resultat;
        }
    }

    public function UserPermission()
    {
        $requete = $this->dao->prepare("SELECT * FROM permissions WHERE RefUsers=:RefUsers");
        $requete->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
        $result = $requete->fetchAll();
        return $result;
    }
    public function getList()
    {
        $requete = $this->dao->prepare("SELECT * FROM users INNER JOIN permissions ON permissions.RefUsers=users.RefUsers");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
}