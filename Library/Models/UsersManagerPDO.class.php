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
        $requete = $this->dao->prepare("SELECT * FROM users ");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function CourrierChmod()
    {
        $requete = $this->dao->prepare("SELECT * FROM type ");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }


    public function VerifyChmod($type, $users)
    {
        $requete = $this->dao->prepare("SELECT * FROM TbleChmod WHERE RefType=:type AND RefUsers=:users");
        $requete->bindValue(':type', $type, \PDO::PARAM_INT);
        $requete->bindValue(':users', $users, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function addChmod()
    {
        $requeteDelete = $this->dao->prepare('DELETE FROM TbleChmod WHERE RefUsers=:RefUsers');
        $requeteDelete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
        $requeteDelete->execute();
        foreach ($_POST['RefType'] as $key => $value) {
            $requeteInsert = $this->dao->prepare('INSERT INTO TbleChmod(RefType,RefUsers) VALUES(:RefType,:RefUsers)');
            $requeteInsert->bindValue(':RefType', $value, \PDO::PARAM_INT);
            $requeteInsert->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
            $requeteInsert->execute();
        }
    }
    public function getStatutTypeDemande($typedemande)
    {

        $requete = $this->dao->prepare("SELECT * FROM statut_demande WHERE RefTypeDemande=:RefTypeDemande ");
        $requete->bindValue(':RefTypeDemande', $typedemande);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function addPermissionsApprobation()
    {


        $requeteDelete = $this->dao->prepare('DELETE FROM permissions_approbation WHERE RefUsers=:RefUsers');
        $requeteDelete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
        $requeteDelete->execute();
        foreach ($_POST['RefTypeDemande'] as $type => $typedemande) {
            foreach ($_POST['RefStatutDemande'] as $key => $statutdmenade) {
                $requeteInsert = $this->dao->prepare('INSERT INTO permissions_approbation(RefUsers,name_approv) VALUES(:RefUsers,:name_approv)');
                $requeteInsert->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':name_approv', $statutdmenade, \PDO::PARAM_INT);
                $requeteInsert->execute();
            }
        }
    }

    public function verifyStatut($statut, $users)
    {
        $requete = $this->dao->prepare("SELECT * FROM permissions_approbation WHERE RefUsers=:users AND name_approv=:name_approv");
        $requete->bindValue(':users', $users, \PDO::PARAM_INT);
        $requete->bindValue(':name_approv', $statut, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function ListPermissionsActions()
    {
        $requete = $this->dao->prepare("SELECT * FROM permissions_actions ");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function addPermissionsActions()
    {
        $requeteDelete = $this->dao->prepare('DELETE FROM permissions WHERE RefUsers=:RefUsers');
        $requeteDelete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
        $requeteDelete->execute();
        foreach ($_POST['RefPermissionsActions'] as $key => $value) {
            $requeteInsert = $this->dao->prepare('INSERT INTO permissions(RefUsers,access) VALUES(:RefUsers,:access)');
            $requeteInsert->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
            $requeteInsert->bindValue(':access', $value, \PDO::PARAM_INT);
            $requeteInsert->execute();
        }
    }



    public function verifyStatutPermissionsActions($users, $access)
    {
        $requete = $this->dao->prepare("SELECT * FROM permissions WHERE RefUsers=:users AND access=:access");
        $requete->bindValue(':users', $users, \PDO::PARAM_INT);
        $requete->bindValue(':access', $access, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }
}