<?php

namespace Library\Models;



class EmployeManagerPDO extends \Library\Models\EmployeManager
{

    public function getList()
    {
        $requete = $this->dao->prepare("SELECT * FROM tbleemploye INNER JOIN tbleservice ON tbleservice.RefService=tbleemploye.RefService  INNER JOIN tblegenre ON tblegenre.RefGenre=tbleemploye.genreEmploye ");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function getService()
    {
        $requete = $this->dao->prepare("SELECT * FROM tbleservice");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function getGenre()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblegenre");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function add()

    {
        $requete = $this->dao->prepare("INSERT INTO tbleemploye(Matricule,nomEmploye, prenomEmploye, posteEmploye, telephoneEmploye, emailEmploye,ageEmploye, genreEmploye,RefService) VALUES (:Matricule,:nomEmploye, :prenomEmploye, :posteEmploye, :telephoneEmploye, :emailEmploye, :ageEmploye, :genreEmploye, :RefService)");
        $requete->bindValue(':Matricule', $_POST['Matricule'], \PDO::PARAM_STR);
        $requete->bindValue(':nomEmploye', $_POST['nomEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':prenomEmploye', $_POST['prenomEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':posteEmploye', $_POST['posteEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':telephoneEmploye', $_POST['telephoneEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':emailEmploye', $_POST['emailEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':ageEmploye', $_POST['ageEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':genreEmploye', $_POST['RefGenre'], \PDO::PARAM_STR);
        $requete->bindValue(':RefService', $_POST['RefService'], \PDO::PARAM_STR);
        $requete->execute();
    }
    public function getEmploye($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbleemploye WHERE RefEmploye=:RefEmploye");
        $requete->bindValue(':RefEmploye', $id, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function update()
    {
        $requete = $this->dao->prepare("UPDATE tbleemploye SET Matricule=:Matricule, nomEmploye=:nomEmploye, prenomEmploye=:prenomEmploye, posteEmploye=:posteEmploye, telephoneEmploye=:telephoneEmploye, emailEmploye=:emailEmploye,ageEmploye=:ageEmploye, genreEmploye=:genreEmploye,RefService=:RefService WHERE RefEmploye=:RefEmploye");
        $requete->bindValue(':Matricule', $_POST['Matricule'], \PDO::PARAM_STR);
        $requete->bindValue(':nomEmploye', $_POST['nomEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':prenomEmploye', $_POST['prenomEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':posteEmploye', $_POST['posteEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':telephoneEmploye', $_POST['telephoneEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':emailEmploye', $_POST['emailEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':ageEmploye', $_POST['ageEmploye'], \PDO::PARAM_STR);
        $requete->bindValue(':genreEmploye', $_POST['RefGenre'], \PDO::PARAM_STR);
        $requete->bindValue(':RefService', $_POST['RefService'], \PDO::PARAM_STR);
        $requete->bindValue(':RefEmploye', $_POST['RefEmploye'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function delete($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tbleemploye WHERE RefEmploye=:RefEmploye");
        $requete->bindValue(':RefEmploye', $id, \PDO::PARAM_STR);
        $requete->execute();
    }

    public function linkUsers()
    {
        $requete = $this->dao->prepare("UPDATE tbleemploye SET RefUsers=:RefUsers WHERE RefEmploye=:RefEmploye");
        $requete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_STR);
        $requete->bindValue(':RefEmploye', $_POST['RefEmploye'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function addService()
    {
        $requete = $this->dao->prepare("INSERT INTO tbleservice(name_service) VALUES (:name_service)");
        $requete->bindValue(':name_service', $_POST['name_service'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function getUniqueService($id)

    {
        $requete = $this->dao->prepare("SELECT * FROM tbleservice WHERE RefService=:RefService");
        $requete->bindValue(':RefService', $id, \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }


    public function editService()
    {
        $requete = $this->dao->prepare("UPDATE tbleservice SET name_service=:name_service WHERE RefService=:RefService");
        $requete->bindValue(':name_service', $_POST['name_service'], \PDO::PARAM_STR);
        $requete->bindValue(':RefService', $_POST['RefService'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function deleteService($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tbleservice WHERE RefService=:RefService");
        $requete->bindValue(':RefService', $id, \PDO::PARAM_STR);
        $requete->execute();
    }
}