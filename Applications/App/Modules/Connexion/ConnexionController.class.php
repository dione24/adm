<?php

namespace Applications\App\Modules\Connexion;

class ConnexionController extends \Library\BackController
{

    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Page de Connexion"); // Titre de la page
        $this->page->setTemplate('login');
        if ($request->method() == 'POST') {
            $User = $this->managers->getManagerOf('Users')->login($request->postData('login'), $request->postData('password'));
            if (!empty($User)) {
                $this->app()->user()->setAuthenticated();
                $_SESSION['RefUsers'] = $User['RefUsers'];
                $_SESSION['login'] = $User['login'];
                $_SESSION['Nom'] = $User['nom'];
                $_SESSION['Prenom'] = $User['prenom'];
                $_SESSION['statut'] = $User['status'];
                $_SESSION['email'] = $User['email'];
                $this->app()->httpResponse()->redirect('/');
            }
        }
    }

    public function executePannel(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Utilisateurs");
        $ListeUsers =  $this->managers->getManagerOf('Users')->getListeOf();
        $this->page->addVar("ListeUsers", $ListeUsers);
        $Statut =  $this->managers->getManagerOf('Users')->Statut();
        $this->page->addVar("Statut", $Statut);
    }


    public function executeAddUsers(\Library\HTTPRequest $request)
    {

        $this->page->addVar("titles", "Ajouter un Utilisateur");
        $this->managers->getManagerOf('Users')->AddUsers($request);
        $this->app()->httpResponse()->redirect("/admin/utilisateurs/liste");
    }


    public function executeLogout(\Library\HTTPRequest $request)
    {
        $this->page->addVar('titles', 'Logout');
        $this->app()->user()->setAuthenticated(false); //deconnexion de user
        $this->app()->user()->setFlash('Logout Successul');
        $this->app()->httpResponse()->redirect('/');
    }

    public function executeProfile(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Profile");
        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Users")->UpdatePassword($request);
            $this->managers->getManagerOf("Comptabilite")->deleteFournisseur($request->getData('id'));
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Changement effectué.';
            $this->app->httpResponse()->redirect("/user/profile");
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }
}