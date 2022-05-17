<?php

namespace Library\Models;

class DemandeManagerPDO extends \Library\Models\DemandeManager
{

    public function getDemandeList()
    {
        $requete = $this->dao->prepare("SELECT * FROM typedemande ORDER BY RefTypeDemande ASC ");
        $requete->execute();
        $resultat = $requete->fetchAll();

        return $resultat;
    }

    public function getMesDemandes()
    {
        $requete = $this->dao->prepare("SELECT * FROM tbledemande INNER JOIN typedemande ON typedemande.RefTypeDemande=tbledemande.RefTypeDemande INNER JOIN satut_demande ON satut_demande.RefStatutDemande=tbledemande.statut_demande   WHERE tbledemande.RefDemandeur=:RefDemandeur ORDER BY tbledemande.RefDemande DESC");
        $requete->bindValue(':RefDemandeur', $_SESSION['RefUsers']);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }
    public function getSingleDemande($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbledemande INNER JOIN typedemande ON typedemande.RefTypeDemande=tbledemande.RefTypeDemande INNER JOIN satut_demande ON satut_demande.RefStatutDemande=tbledemande.statut_demande   WHERE tbledemande.RefDemande=:RefDemande ");
        $requete->bindValue(':RefDemande', $id);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }





    public function addDemande()
    {

        $requete = $this->dao->prepare("INSERT INTO tbledemande(RefTypeDemande,libele,note,file,RefDemandeur) VALUES(:RefTypeDemande,:libele,:note,:file,:RefDemandeur)");
        $requete->bindValue(':RefTypeDemande', $_POST['RefTypeDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
        $requete->bindValue(':note', $_POST['note'], \PDO::PARAM_STR);
        $requete->bindValue(':file', 'Null', \PDO::PARAM_STR);
        $requete->bindValue(':RefDemandeur', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
    }
    public function updateDemande()
    {
        $requete = $this->dao->prepare("UPDATE tblentreprise SET Nom=:Nom, RefPoleActivite=:RefPoleActivite WHERE RefEntreprise=:RefEntreprise");
        $requete->bindValue(':Nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':RefPoleActivite', $_POST['pole'], \PDO::PARAM_STR);
        $requete->bindValue(':RefEntreprise', $_POST['RefEntreprise'], \PDO::PARAM_INT);
        $requete->execute();
    }
    public function deleteDemande($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tblentreprise WHERE RefEntreprise=:RefEntreprise");
        $requete->bindValue(':RefEntreprise', $id, \PDO::PARAM_INT);
        $requete->execute();
    }
}