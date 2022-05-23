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


    public function addFournisseur()
    {
        $requete = $this->dao->prepare(" INSERT INTO tblefournisseur(nomfournisseur,adressefournisseur,contactfournisseur,rcfournisseur,niffournisseur,banquefournisseur,emailfournisseur) VALUES(:nomfournisseur,:adressefournisseur,:contactfournisseur,:rcfournisseur,:niffournisseur,:banquefournisseur,:emailfournisseur)  ");
        $requete->bindValue(':nomfournisseur', $_POST['nomfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':adressefournisseur', $_POST['adressefournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':contactfournisseur', $_POST['contactfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':rcfournisseur', $_POST['rcfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':niffournisseur', $_POST['niffournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':banquefournisseur', $_POST['banquefournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':emailfournisseur', $_POST['emailfournisseur'], \PDO::PARAM_STR);
        $requete->execute();
    }
    public function getFournisseurs()
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblefournisseur ");
        $requete->execute();
        $fournisseurs = $requete->fetchAll();
        return $fournisseurs;
    }


    public function getSingleFournisseur($id)
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblefournisseur WHERE RefFournisseur=:RefFournisseur ");
        $requete->bindValue(':RefFournisseur', $id);
        $requete->execute();
        $fournisseur = $requete->fetch();
        return $fournisseur;
    }

    public function updateFournisseur()
    {
        $requete = $this->dao->prepare(" UPDATE tblefournisseur SET nomfournisseur=:nomfournisseur,adressefournisseur=:adressefournisseur,contactfournisseur=:contactfournisseur,rcfournisseur=:rcfournisseur,niffournisseur=:niffournisseur,banquefournisseur=:banquefournisseur,emailfournisseur=:emailfournisseur WHERE RefFournisseur=:RefFournisseur ");
        $requete->bindValue(':nomfournisseur', $_POST['nomfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':adressefournisseur', $_POST['adressefournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':contactfournisseur', $_POST['contactfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':rcfournisseur', $_POST['rcfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':niffournisseur', $_POST['niffournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':banquefournisseur', $_POST['banquefournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':emailfournisseur', $_POST['emailfournisseur'], \PDO::PARAM_STR);
        $requete->bindValue(':RefFournisseur', $_POST['RefFournisseur'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function deleteFournisseur($id)
    {
        $requete = $this->dao->prepare(" DELETE FROM tblefournisseur WHERE RefFournisseur=:RefFournisseur ");
        $requete->bindValue(':RefFournisseur', $id);
        $requete->execute();
    }

    public function addFacturation()
    {

        if (!empty($_FILES['file'])) {
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                if ($_FILES['file']['size'] <= 100000000) {
                    $type =  array('docx', 'pdf', 'doc', 'jpg', 'png', 'jpeg', 'gif');
                    $infofichier = pathinfo($_FILES['file']['name']);
                    $extension_upload = $infofichier['extension'];
                    $tmp = explode('.', $_FILES['file']['name']);
                    $new_file_name = round(microtime(true)) . '.' . end($tmp);

                    if (in_array($extension_upload, $type)) {
                        move_uploaded_file($_FILES['file']['tmp_name'], '../Web/documents/' . $new_file_name);
                    } else {
                        header("location : /comptabilite/addFacturations");
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }
        }

        $requete = $this->dao->prepare("INSERT INTO tblefacture(RefDemande,libele,numfacture,datefacture,RefFournisseur,echeance,montantht,tva,montantttc,fichier,Ref_Insert) VALUES(:RefDemande,:libele,:numfacture,:datefacture,:RefFournisseur,:echeance,:montantht,:tva,:montantttc,:fichier,:Ref_Insert)");
        $requete->bindValue(":RefDemande", $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
        $requete->bindValue(':numfacture', $_POST['numfacture'], \PDO::PARAM_STR);
        $requete->bindValue(':datefacture', $_POST['datefacture'], \PDO::PARAM_STR);
        $requete->bindValue(':RefFournisseur', $_POST['RefFournisseur'], \PDO::PARAM_INT);
        $requete->bindValue(':echeance', $_POST['echeance'], \PDO::PARAM_STR);
        $requete->bindValue(':montantht', $_POST['montantht'], \PDO::PARAM_STR);
        $requete->bindValue(':tva', $_POST['tva'], \PDO::PARAM_STR);
        $requete->bindValue(':montantttc', $_POST['montantttc'], \PDO::PARAM_STR);
        $requete->bindValue(':fichier', $new_file_name, \PDO::PARAM_STR);
        $requete->bindValue(':Ref_Insert', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function getFacturations()
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblefacture INNER JOIN tblefournisseur ON tblefacture.RefFournisseur=tblefournisseur.RefFournisseur INNER JOIN tblestatutfacture ON tblefacture.statut=tblestatutfacture.RefStatut ");
        $requete->execute();
        $facturations = $requete->fetchAll();
        return $facturations;
    }

    public function getSingleFacture($id)
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblefacture WHERE RefFacture=:RefFacture ");
        $requete->bindValue(':RefFacture', $id);
        $requete->execute();
        $facturation = $requete->fetch();
        return $facturation;
    }

    public function updateFacture()
    {
        if (!empty($_FILES['file'])) {
            if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                if ($_FILES['file']['size'] <= 100000000) {
                    $type =  array('docx', 'pdf', 'doc', 'jpg', 'png', 'jpeg', 'gif');
                    $infofichier = pathinfo($_FILES['file']['name']);
                    $extension_upload = $infofichier['extension'];
                    $tmp = explode('.', $_FILES['file']['name']);
                    $new_file_name = round(microtime(true)) . '.' . end($tmp);

                    if (in_array($extension_upload, $type)) {
                        move_uploaded_file($_FILES['file']['tmp_name'], '../Web/documents/' . $new_file_name);
                    } else {
                        header("location : /comptabilite/addFacturations");
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }
        }



        $requete = $this->dao->prepare(" UPDATE tblefacture SET RefDemande=:RefDemande, libele=:libele,numfacture=:numfacture,datefacture=:datefacture,RefFournisseur=:RefFournisseur,echeance=:echeance,montantht=:montantht,tva=:tva,montantttc=:montantttc,fichier=:fichier WHERE RefFacture=:RefFacture ");
        $requete->bindValue(":RefDemande", $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(":libele", $_POST['libele'], \PDO::PARAM_STR);
        $requete->bindValue(":numfacture", $_POST['numfacture'], \PDO::PARAM_STR);
        $requete->bindValue(':datefacture', $_POST['datefacture'], \PDO::PARAM_STR);
        $requete->bindValue(':RefFournisseur', $_POST['RefFournisseur'], \PDO::PARAM_INT);
        $requete->bindValue(':echeance', $_POST['echeance'], \PDO::PARAM_STR);
        $requete->bindValue(':montantht', $_POST['montantht'], \PDO::PARAM_STR);
        $requete->bindValue(':tva', $_POST['tva'], \PDO::PARAM_STR);
        $requete->bindValue(':montantttc', $_POST['montantttc'], \PDO::PARAM_STR);
        $requete->bindValue(':fichier', $new_file_name, \PDO::PARAM_STR);
        $requete->bindValue(':RefFacture', $_POST['RefFacture'], \PDO::PARAM_INT);
        $requete->execute();
    }


    public function deleteFacture($id)
    {
        $requete = $this->dao->prepare(" DELETE FROM tblefacture WHERE RefFacture=:RefFacture ");
        $requete->bindValue(':RefFacture', $id, \PDO::PARAM_INT);
        $requete->execute();
    }


    public function getStatut()
    {
        $requete = $this->dao->prepare(" SELECT * FROM tblestatutfacture ");
        $requete->execute();
        $statut = $requete->fetchAll();
        return $statut;
    }

    public function updateStatutFacture()
    {
        $requete = $this->dao->prepare(" UPDATE tblefacture SET statut=:statut WHERE RefFacture=:RefFacture ");
        $requete->bindValue(":statut", $_POST['RefStatut'], \PDO::PARAM_INT);
        $requete->bindValue(":RefFacture", $_POST['RefFacture'], \PDO::PARAM_INT);
        $requete->execute();
    }
}