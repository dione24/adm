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

    public function getListeOf()
    {
        $requete = $this->dao->prepare("SELECT * FROM users INNER JOIN tblestatus ON tblestatus.refstatus=users.status WHERE  tblestatus.refstatus=7");
        $requete->execute();
        $Users = $requete->fetchAll();
        return $Users;
    }

    public function Statut()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblestatus");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function UsersInfo($id)
    {
        $requete  = $this->dao->prepare("SELECT * FROM deb_acces WHERE RefDeb=:RefDeb");
        $requete->bindValue(':RefDeb', $id, \PDO::PARAM_INT);
        $requete->execute();
        $usersinfo = $requete->fetch();
        return $usersinfo;
    }


    public function AddUsers()
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $requete = $this->dao->prepare("INSERT INTO users (nom,prenom,login,password,status,email_users) VALUES (:nom,:prenom,:login,:password,:status,:email)");
        $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
        $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
        $requete->bindValue(':password', $password, \PDO::PARAM_STR);
        $requete->bindValue(':status', $_POST['id_status'], \PDO::PARAM_INT);
        $requete->bindValue(':email_users', $_POST['email'], \PDO::PARAM_STR);
        $requete->execute();
    }
}
