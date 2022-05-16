<?php

namespace Library\Models;

class AdministrerManagerPDO extends \Library\Models\AdministrerManager
{
    public function addEntreprise()
    {
        $requete = $this->dao->prepare("INSERT INTO tblentreprise (Nom,RefPoleActivite) VALUES (:Nom,:RefPoleActivite)");
        $requete->bindValue(':Nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':RefPoleActivite', $_POST['pole'], \PDO::PARAM_STR);
        $requete->execute();
    }
    public function updateEntreprise()
    {
        $requete = $this->dao->prepare("UPDATE tblentreprise SET Nom=:Nom, RefPoleActivite=:RefPoleActivite WHERE RefEntreprise=:RefEntreprise");
        $requete->bindValue(':Nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':RefPoleActivite', $_POST['pole'], \PDO::PARAM_STR);
        $requete->bindValue(':RefEntreprise', $_POST['RefEntreprise'], \PDO::PARAM_INT);
        $requete->execute();
    }
    public function deleteEnterprise($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblentreprise WHERE RefEntreprise=:RefEntreprise");
        $requete->bindValue(':RefEntreprise', $id, \PDO::PARAM_INT);
        $requete->execute();
    }


    public function ListeEnteprise()
    {
        $requete = $this->dao->prepare("SELECT *, tblentreprise.Nom AS NomEntreprise, tblpoleactivite.Nom AS NomPoleActivite FROM tblentreprise INNER JOIN tblpoleactivite ON (tblentreprise.RefPoleActivite = tblpoleactivite.RefPoleActivite)");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function addPole()
    {
        $requete = $this->dao->prepare("INSERT INTO tblpoleactivite (Nom) VALUES (:Nom)");
        $requete->bindValue(':Nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->execute();
    }
    public function updatePole()
    {
        $requete = $this->dao->prepare("UPDATE tblpoleactivite SET Nom=:Nom  WHERE RefPoleActivite=:RefPoleActivite");
        $requete->bindValue(':Nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':RefPoleActivite', $_POST['RefPoleActivite'], \PDO::PARAM_INT);
        $requete->execute();
    }
    public function deletePole($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblpoleactivite WHERE RefPoleActivite=:RefPoleActivite");
        $requete->bindValue(':RefPoleActivite', $id, \PDO::PARAM_INT);
        $requete->execute();
    }
    public function ListePole()
    {
        $requete = $this->dao->prepare("SELECT * FROM tblpoleactivite");
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
}