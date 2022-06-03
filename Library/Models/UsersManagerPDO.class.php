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


    public function SendMail($to, $login, $password)
    {
        $headers = 'From: adm.malicreances.com' . "\r\n" .
            'Reply-To: adm.malicreances.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $subject = "Identifiants de connexion | ADMN MALI CREANCES";
        $message = " Veuillez recevoir vos identifiants de connexion : \n\n" .
            "Login : " . $login . "\n" .
            "Mot de passe : " . $password . "\n\n" .
            "http://adm.malicreances-sa.com" . "\n\n" .
            "Cordialement,\n" .
            "L'équipe  MALI CREANCES";

        $htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to CodexWorld</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>CodexWorld</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>contact@codexworld.com</td> 
            </tr> 
            <tr> 
                <th>Website:</th><td><a href="http://www.codexworld.com">www.codexworld.com</a></td> 
            </tr> 
        </table> 
    </body> 
    </html>';

        // Set content-type header for sending HTML email 
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'Cc: welcome@example.com' . "\r\n";
        $headers .= 'Bcc: welcome2@example.com' . "\r\n";
        mail($to, $subject, $htmlContent, $headers);
    }

    public function addUsers()
    {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $requete = $this->dao->prepare('INSERT INTO users(login,password,status,nom,prenom,email) VALUES(:login,:password,:status,:nom,:prenom,:email)');
        $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
        $requete->bindValue(':password', $password, \PDO::PARAM_STR);
        $requete->bindValue(':status', $_POST['status'], \PDO::PARAM_STR);
        $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
        $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);
        $requete->execute();
        $this->SendMail($_POST['email'], $_POST['login'], $_POST['password']);
    }


    public function getUnique($id)
    {
        $requete = $this->dao->prepare('SELECT * FROM users WHERE RefUsers=:id');
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
        $resultat = $requete->fetch();
        return $resultat;
    }

    public function updateUsers()
    {
        if (!empty($_POST['password'])) {

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $requete = $this->dao->prepare('UPDATE users SET login=:login,password=:password,status=:status,nom=:nom,prenom=:prenom,email=:email WHERE RefUsers=:RefUsers');
            $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
            $requete->bindValue(':password', $password, \PDO::PARAM_STR);
            $requete->bindValue(':status', $_POST['status'], \PDO::PARAM_STR);
            $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
            $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
            $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);
            $requete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
            $requete->execute();
        } else {
            $requete = $this->dao->prepare('UPDATE users SET login=:login,status=:status,nom=:nom,prenom=:prenom,email=:email WHERE RefUsers=:RefUsers');
            $requete->bindValue(':login', $_POST['login'], \PDO::PARAM_STR);
            $requete->bindValue(':status', $_POST['status'], \PDO::PARAM_STR);
            $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
            $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
            $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);
            $requete->bindValue(':RefUsers', $_POST['RefUsers'], \PDO::PARAM_INT);
            $requete->execute();
        }
    }
    public function deleteUsers($id)
    {
        $requete = $this->dao->prepare('DELETE FROM users WHERE RefUsers=:id');
        $requete->bindValue(':id', $id, \PDO::PARAM_INT);
        $requete->execute();
    }




    public function UpdatePassword()
    {
        $requete = $this->dao->prepare("SELECT *  FROM users WHERE RefUsers=:RefUsers");
        $requete->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_STR);
        $requete->execute();
        $resultat = $requete->fetch();
        if (password_verify($_POST['password'], $resultat['password'])) {
            if ($_POST['newpassword'] == $_POST['confirmpassword']) {
                $newpassword = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
                $query = $this->dao->prepare("UPDATE users SET password=:password WHERE RefUsers=:RefUsers");
                $query->bindValue(':password', $newpassword, \PDO::PARAM_STR);
                $query->bindValue(':RefUsers', $_SESSION['RefUsers'], \PDO::PARAM_STR);
                $query->execute();
            }
        } else {
            header('Location: /user/profile');
        }
    }
}