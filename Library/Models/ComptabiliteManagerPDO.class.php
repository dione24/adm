<?php

namespace Library\Models;



class ComptabiliteManagerPDO extends \Library\Models\ComptabiliteManager
{

    public function setDemandePayement($id)
    {
        $requete = $this->dao->prepare(" UPDATE tbledemande SET payement=1 WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id);
        $requete->execute();
    }


    public function addDecaissement()
    {
        if (!empty($_POST['RefDemande'])) {
            $this->setDemandePayement($_POST['RefDemande']);
        }
        $requete = $this->dao->prepare(" INSERT INTO tbledecaissement(RefDemande,datedecaissement,nomcomplet,motifdecaissement,montantdecaissement,Insert_Users) VALUES(:RefDemande,:datedecaissement,:nomcomplet,:motifdecaissement,:montantdecaissement,:Insert_Users)  ");
        $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':datedecaissement', $_POST['datedecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':nomcomplet', $_POST['nomcomplet'], \PDO::PARAM_STR);
        $requete->bindValue(':motifdecaissement', $_POST['motifdecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':montantdecaissement', $_POST['montantdecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':Insert_Users', $_SESSION['RefUsers'], \PDO::PARAM_STR);
        $requete->execute();
    }


    public function getSingleDemande($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbledemande INNER JOIN typedemande ON typedemande.RefTypeDemande=tbledemande.RefTypeDemande INNER JOIN statut_demande ON statut_demande.RefStatutDemande=tbledemande.statut_demande INNER JOIN users ON users.RefUsers=tbledemande.RefDemandeur WHERE tbledemande.RefDemande=:RefDemande ");
        $requete->bindValue(':RefDemande', $id);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function getDecaissement()
    {
        $requete = $this->dao->prepare(" SELECT * FROM tbledecaissement ");
        $requete->execute();
        $decaissement = $requete->fetchAll();
        foreach ($decaissement as $key => $decaissements) {
            $decaissement[$key]['demande'] = $this->getSingleDemande($decaissements['RefDemande']);
        }
        return $decaissement;
    }


    public function getSingleDecaissement($id)
    {
        $requete = $this->dao->prepare(" SELECT * FROM tbledecaissement WHERE RefDecaissement=:RefDecaissement ");
        $requete->bindValue(':RefDecaissement', $id);
        $requete->execute();
        $decaissement = $requete->fetch();
        return $decaissement;
    }

    public function updateDecaissement()
    {
        $requete = $this->dao->prepare(" UPDATE tbledecaissement SET RefDemande=:RefDemande,datedecaissement=:datedecaissement,nomcomplet=:nomcomplet,motifdecaissement=:motifdecaissement,montantdecaissement=:montantdecaissement,Insert_Users=:Insert_Users WHERE RefDecaissement=:RefDecaissement ");
        $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':datedecaissement', $_POST['datedecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':nomcomplet', $_POST['nomcomplet'], \PDO::PARAM_STR);
        $requete->bindValue(':motifdecaissement', $_POST['motifdecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':montantdecaissement', $_POST['montantdecaissement'], \PDO::PARAM_STR);
        $requete->bindValue(':Insert_Users', $_SESSION['RefUsers'], \PDO::PARAM_STR);
        $requete->bindValue(':RefDecaissement', $_POST['RefDecaissement'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function deleteDecaissement($id)
    {
        $requete = $this->dao->prepare(" DELETE FROM tbledecaissement WHERE RefDecaissement=:RefDecaissement ");
        $requete->bindValue(':RefDecaissement', $id);
        $requete->execute();
    }
}