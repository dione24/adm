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
        $requete = $this->dao->prepare("SELECT * FROM tbledemande INNER JOIN typedemande ON typedemande.RefTypeDemande=tbledemande.RefTypeDemande INNER JOIN satut_demande ON satut_demande.RefStatutDemande=tbledemande.statut_demande INNER JOIN users ON users.RefUsers=tbledemande.RefDemandeur   WHERE tbledemande.RefDemande=:RefDemande ");
        $requete->bindValue(':RefDemande', $id);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }





    public function addDemande()
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
                        header("location : /demande/display/index");
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }
        }


        $requete = $this->dao->prepare("INSERT INTO tbledemande(RefTypeDemande,libele,note,file,RefDemandeur) VALUES(:RefTypeDemande,:libele,:note,:file,:RefDemandeur)");
        $requete->bindValue(':RefTypeDemande', $_POST['RefTypeDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
        $requete->bindValue(':note', $_POST['note'], \PDO::PARAM_STR);
        $requete->bindValue(':file', $new_file_name, \PDO::PARAM_STR);
        $requete->bindValue(':RefDemandeur', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
    }


    public function getEmployeInformation($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbleemploye WHERE RefUsers=:RefUsers");
        $requete->bindValue(':RefUsers', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function addObservation()
    {
        $requete = $this->dao->prepare("INSERT INTO commentaires(observation,RefDemande,Insert_Users) VALUES(:observation,:RefDemande,:Insert_Users)");
        $requete->bindValue(':observation', $_POST['observation'], \PDO::PARAM_STR);
        $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':Insert_Users', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function getDemandeObservation($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM commentaires INNER JOIN tbleemploye ON tbleemploye.RefUsers=commentaires.Insert_Users WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function uploadfile()
    {

        if (!empty($_FILES['name_documents'])) {
            if (isset($_FILES['name_documents']) && $_FILES['name_documents']['error'] == 0) {
                if ($_FILES['name_documents']['size'] <= 100000000) {
                    $type =  array('docx', 'pdf', 'doc', 'jpg', 'png', 'jpeg', 'gif');
                    $infofichier = pathinfo($_FILES['name_documents']['name']);
                    $extension_upload = $infofichier['extension'];
                    $tmp = explode('.', $_FILES['name_documents']['name']);
                    $new_file_name = round(microtime(true)) . '.' . end($tmp);

                    if (in_array($extension_upload, $type)) {
                        move_uploaded_file($_FILES['name_documents']['tmp_name'], '../Web/documents/' . $new_file_name);
                    } else {
                        header("location : /demande/display/" . $_POST['RefDemande']);
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }
        }
        $requete = $this->dao->prepare("INSERT INTO documents(name_documents,RefDemande,Uploader_ID) VALUES(:name_documents,:RefDemande,:Uploader_ID)");

        $requete->bindValue(':name_documents', $new_file_name, \PDO::PARAM_STR);
        $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
        $requete->bindValue(':Uploader_ID', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function getDemandeDocument($id)
    {
        $requete = $this->dao->prepare("SELECT * FROM documents WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }

    public function updateDemande()
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
                        header("location : /demande/display/index");
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }


            $requete = $this->dao->prepare("UPDATE tbledemande SET RefTypeDemande=:RefTypeDemande,libele=:libele,note=:note,file=:file WHERE RefDemande=:RefDemande");
            $requete->bindValue(':RefTypeDemande', $_POST['RefTypeDemande'], \PDO::PARAM_INT);
            $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
            $requete->bindValue(':note', $_POST['note'], \PDO::PARAM_STR);
            $requete->bindValue(':file', $new_file_name, \PDO::PARAM_STR);
            $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
            $requete->execute();
        } else {
            $requete = $this->dao->prepare("UPDATE tbledemande SET RefTypeDemande=:RefTypeDemande,libele=:libele,note=:note WHERE RefDemande=:RefDemande");
            $requete->bindValue(':RefTypeDemande', $_POST['RefTypeDemande'], \PDO::PARAM_INT);
            $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
            $requete->bindValue(':note', $_POST['note'], \PDO::PARAM_STR);
            $requete->bindValue(':RefDemande', $_POST['RefDemande'], \PDO::PARAM_INT);
            $requete->execute();
        }
    }

    public function delete($id)
    {
        $requete = $this->dao->prepare("DELETE FROM tbledemande WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function getDemande($value)
    {
        $requete = $this->dao->prepare("SELECT * FROM tbledemande INNER JOIN typedemande ON typedemande.RefTypeDemande=tbledemande.RefTypeDemande INNER JOIN satut_demande ON satut_demande.RefStatutDemande=tbledemande.statut_demande  WHERE statut_demande=:statut_demmande   ORDER BY tbledemande.RefDemande DESC");
        $requete->bindValue(':statut_demmande', $value);
        $requete->execute();
        $resultat = $requete->fetchAll();
        return $resultat;
    }


    public function getMesValidations()
    {
        $query = $this->dao->prepare("SELECT * FROM permissions_approbation WHERE RefUsers=:RefUsers");
        $query->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function ApprovDemande($id, $statut)
    {
        $newsatut = $statut + 1;
        $requete = $this->dao->prepare("UPDATE tbledemande SET statut_demande=:statut_demande WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id, \PDO::PARAM_INT);
        $requete->bindValue(':statut_demande', $newsatut, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function CancelDemande($id, $statut)
    {
        $newsatut = 4;
        $requete = $this->dao->prepare("UPDATE tbledemande SET statut_demande=:statut_demande WHERE RefDemande=:RefDemande");
        $requete->bindValue(':RefDemande', $id, \PDO::PARAM_INT);
        $requete->bindValue(':statut_demande', $newsatut, \PDO::PARAM_INT);
        $requete->execute();
    }
}
