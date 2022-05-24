<?php

namespace Library\Models;

class CourrierManagerPDO extends \Library\Models\CourrierManager
{

    public function getListeReceptions()
    {
        $requete = $this->dao->prepare("SELECT * FROM TbleArrive ORDER BY RefArrive DESC ");
        $requete->execute();
        $resultat = $requete->fetchAll();
        foreach ($resultat as $key => $value) {
            $resultat[$key]['verify'] = $this->VerifyFile(2, $value['RefArrive']);
        }
        return $resultat;
    }

    public function getDeparts()
    {
        if ($_SESSION['statut'] == 'admin') {
            $requete = $this->dao->prepare("SELECT * FROM TbleDepart  INNER JOIN type ON type.RefType= TbleDepart.RefType ORDER BY RefCourrier DESC ");
        } else {
            $requete = $this->dao->prepare("SELECT * FROM  TbleDepart INNER JOIN type ON type.RefType= TbleDepart.RefType INNER JOIN TbleChmod ON TbleChmod.RefType=TbleDepart.RefType WHERE TbleChmod.RefUsers=:RefUsers");
            $requete->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        }
        $requete->execute();
        $resultat = $requete->fetchAll();
        foreach ($resultat as $key => $value) {
            $resultat[$key]['verify'] = $this->VerifyFile(1, $value['RefCourrier']);
        }
        return $resultat;
    }





    public function VerifyFile($type, $courrier)
    {
        if ($type == 2) {
            $requeteVerify = $this->dao->prepare('SELECT * FROM TbleArrive WHERE RefArrive=:RefArrive');
            $requeteVerify->bindValue(':RefArrive', $courrier, \PDO::PARAM_INT);
            $requeteVerify->execute();
            $dataVerify = $requeteVerify->fetch();
            return $dataVerify['FileArrive'];
        } elseif ($type == 1) {
            $requeteVerify = $this->dao->prepare('SELECT * FROM TbleDepart WHERE RefCourrier=:RefCourrier');
            $requeteVerify->bindValue(':RefCourrier', $courrier, \PDO::PARAM_INT);
            $requeteVerify->execute();
            $dataVerify = $requeteVerify->fetch();
            return $dataVerify['FileDepart'];
        }
    }

    public function addCourrierArrive()
    {
        $requeteArrive = $this->dao->prepare('INSERT INTO TbleArrive(object,enterprise,RefUsers) VALUES(:object,:enterprise,:RefUsers)');
        $requeteArrive->bindValue(':object', $_POST['object'], \PDO::PARAM_STR);
        $requeteArrive->bindValue(':enterprise', $_POST['enterprise'], \PDO::PARAM_STR);
        $requeteArrive->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requeteArrive->execute();
    }

    public function getCourrierDeparts($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM TbleDepart WHERE RefCourrier=:RefCourrier');
        $requete->bindValue(':RefCourrier', $id, \PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetch();
        return $data;
    }

    public function getCourrierArrive($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM TbleArrive WHERE RefArrive=:RefArrive');
        $requete->bindValue(':RefArrive', $id, \PDO::PARAM_INT);
        $requete->execute();
        $data = $requete->fetch();
        return $data;
    }

    public function getTypeCourrier()
    {
        if ($_SESSION['statut'] != 'admin') {
            $requeteType = $this->dao->prepare("SELECT * FROM type INNER JOIN TbleChmod ON TbleChmod.RefType=type.RefType WHERE RefUsers=:users");
            $requeteType->bindValue(':users', $_SESSION['RefUsers'], \PDO::PARAM_INT);
            $requeteType->execute();
            $dataType = $requeteType->fetchAll();
        } else {
            $requeteType = $this->dao->prepare("SELECT * FROM type ");
            $requeteType->execute();
            $dataType = $requeteType->fetchAll();
        }
        return $dataType;
    }

    public function getTypeCourrierList()
    {
        $requeteType = $this->dao->prepare("SELECT * FROM type");
        $requeteType->execute();
        $dataType = $requeteType->fetchAll();
        return $dataType;
    }



    public function addCourrierDepart()
    {

        if (!empty($_POST['typecourrier']) && !empty($_POST['libele'])) {
            $date = date('Y-m-d H:i:s');
            $Year = date('Y-m-d');
            $requeteCalculate = $this->dao->prepare('SELECT numero_courrier FROM TbleDepart WHERE date_sortie=(SELECT MAX(date_sortie) FROM TbleDepart WHERE RefType=:RefType AND YEAR(date_sortie)=:year) AND RefType=:RefType');
            $requeteCalculate->bindValue('RefType', $_POST['typecourrier'], \PDO::PARAM_INT);
            $requeteCalculate->bindValue('year', $Year, \PDO::PARAM_STR);
            $requeteCalculate->execute();
            $displayCalculate = $requeteCalculate->fetch();
            $type = $_POST['typecourrier'];
            if (empty($displayCalculate)) {
                $numero = 1;
                $requeteInsert = $this->dao->prepare('INSERT INTO TbleDepart(RefType,numero_courrier,RefUsers,libele,date_sortie) VALUES(:RefType,:numero_courrier,:RefUsers,:libele,:date_sortie)');
                $requeteInsert->bindValue(':RefType', $_POST['typecourrier'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':numero_courrier', $numero, \PDO::PARAM_INT);
                $requeteInsert->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
                $requeteInsert->bindValue(':date_sortie', $date, \PDO::PARAM_STR);
                $requeteInsert->execute();
                header("location:/courrier/departs/reference/$numero/$type");
            } else {
                $numero = $displayCalculate['numero_courrier'] + 1;
                $requeteInsert = $this->dao->prepare('INSERT INTO TbleDepart(RefType,numero_courrier,RefUsers,libele,date_sortie) VALUES(:RefType,:numero_courrier,:RefUsers,:libele,:date_sortie)');
                $requeteInsert->bindValue(':RefType', $_POST['typecourrier'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':numero_courrier', $numero, \PDO::PARAM_INT);
                $requeteInsert->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
                $requeteInsert->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
                $requeteInsert->bindValue(':date_sortie', $date, \PDO::PARAM_STR);
                $requeteInsert->execute();
                header("location: /courrier/departs/reference/$numero/$type");
            }
        } else {
            header("location: /home");
            $_SESSION['flash']['warning'] = "Merci de remplir correctement ";
        }
    }

    public  function  RequestNumero($type, $numero)
    {
        $requeteNumero = $this->dao->prepare("SELECT * FROM TbleDepart INNER JOIN type ON type.RefType= TbleDepart.RefType WHERE TbleDepart.RefType=:RefType AND numero_courrier=:numero_courrier");
        $requeteNumero->bindValue(':RefType', $type, \PDO::PARAM_INT);
        $requeteNumero->bindValue(':numero_courrier', $numero, \PDO::PARAM_INT);
        $requeteNumero->execute();
        $displayNumero = $requeteNumero->fetch();
        return $displayNumero;
    }

    public function  getMesReferences()
    {
        $requeteReferences = $this->dao->prepare("SELECT * FROM TbleDepart INNER JOIN type ON type.RefType= TbleDepart.RefType WHERE RefUsers=:RefUsers ORDER BY date_sortie DESC");
        $requeteReferences->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requeteReferences->execute();
        $displayReferences = $requeteReferences->fetchAll();
        foreach ($displayReferences as $key => $value) {
            $displayReferences[$key]['verify'] = $this->VerifyFile(1, $value['RefCourrier']);
        }

        return $displayReferences;
    }

    public function editCourrierArrive()
    {
        $requete  = $this->dao->prepare("UPDATE TbleArrive SET enterprise=:enterprise,object=:object,date_arrivee=:date_arrivee,RefUsers=:RefUsers WHERE RefArrive=:RefArrive");
        $requete->bindValue(':enterprise', $_POST['enterprise'], \PDO::PARAM_STR);
        $requete->bindValue(':object', $_POST['object'], \PDO::PARAM_STR);
        $requete->bindValue(':date_arrivee', $_POST['date_arrivee'], \PDO::PARAM_STR);
        $requete->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->bindValue(':RefArrive', $_POST['RefArrive'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function deleteCourrierArrive($id)
    {
        $requete = $this->dao->prepare("DELETE FROM TbleArrive WHERE RefArrive=:RefArrive");
        $requete->bindValue(':RefArrive', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function editCourrierDeparts()
    {
        $requete  = $this->dao->prepare("UPDATE TbleDepart SET libele=:libele,RefUsers=:RefUsers WHERE RefCourrier=:RefCourrier");
        $requete->bindValue(':libele', $_POST['libele'], \PDO::PARAM_STR);
        $requete->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_INT);
        $requete->bindValue(':RefCourrier', $_POST['RefCourrier'], \PDO::PARAM_INT);
        $requete->execute();
    }

    public function deleteCourrierDeparts($id)
    {
        $requete = $this->dao->prepare("DELETE FROM TbleDepart WHERE RefCourrier=:RefCourrier");
        $requete->bindValue(':RefCourrier', $id, \PDO::PARAM_INT);
        $requete->execute();
    }

    public function addFile()
    {
        if (!empty($_FILES['Courrier_File'])) {
            $basename = "";
            if (isset($_FILES['Courrier_File']) && $_FILES['Courrier_File']['error'] == 0) {
                if ($_FILES['Courrier_File']['size'] <= 100000000) {
                    $type =  array('docx', 'pdf', 'doc', 'jpg', 'png', 'jpeg', 'gif');
                    $infofichier = pathinfo($_FILES['Courrier_File']['name']);
                    $extension_upload = $infofichier['extension'];
                    $tmp = explode('.', $_FILES['Courrier_File']['name']);
                    $new_file_name = round(microtime(true)) . '.' . end($tmp);

                    if (in_array($extension_upload, $type)) {
                        $basename  = basename($_FILES['Courrier_File']['name']);
                        move_uploaded_file($_FILES['Courrier_File']['tmp_name'], '../Web/documents/' . $new_file_name);
                    } else {
                        header("location : /home");
                        $_SESSION['flash']['danger'] = "La taille du fichier ou le format du fichier n'est pas prise en compte ! ";
                    }
                }
            }

            if ($_POST['Type'] == 2) {
                $requeteAddFile = $this->dao->prepare('UPDATE TbleArrive SET  FileArrive=:FileArrive WHERE RefArrive=:RefArrive');
                $requeteAddFile->bindValue(':FileArrive', $new_file_name, \PDO::PARAM_STR);
                $requeteAddFile->bindValue(':RefArrive', $_POST['RefArrive'], \PDO::PARAM_INT);
                $requeteAddFile->execute();
            } else {
                $requeteAddFile = $this->dao->prepare('UPDATE TbleDepart SET  FileDepart=:FileDepart WHERE RefCourrier=:RefCourrier');
                $requeteAddFile->bindValue(':FileDepart', $new_file_name, \PDO::PARAM_STR);
                $requeteAddFile->bindValue(':RefCourrier', $_POST['RefCourrier'], \PDO::PARAM_INT);
                $requeteAddFile->execute();
            }
        }
    }
}