<?php

namespace Applications\App\Modules\Pannel;

class PannelController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Gestion des Utilisateurs"); // Titre de la page
        $users = $this->managers->getManagerOf('Users')->getList();
        $this->page->addVar("users", $users);

        $chmodCourrier = $this->managers->getManagerOf('Users')->CourrierChmod();
        $this->page->addVar("chmodCourrier", $chmodCourrier);

        $this->page->addVar("functions", $this->managers->getManagerOf("Users"));

        $getDemandeList = $this->managers->getManagerOf('Demande')->getDemandeList();
        foreach ($getDemandeList as $key => $value) {
            $getDemandeList[$key]['StatutTypeDemande'] = $this->managers->getManagerOf('Users')->getStatutTypeDemande($value['RefTypeDemande']);
        }
        $this->page->addVar("getDemandeList", $getDemandeList);

        $ListPermissionsActions = $this->managers->getManagerOf('Users')->ListPermissionsActions();
        $this->page->addVar("ListPermissionsActions", $ListPermissionsActions);

        if ($request->method() == "POST" && !empty($_POST['RefType'])) {
            $this->managers->getManagerOf("Users")->addChmod();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/index');
        }

        if ($request->method() == "POST" && !empty($_POST['RefTypeDemande'])) {
            $this->managers->getManagerOf("Users")->addPermissionsApprobation();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/index');
        }

        if ($request->method() == "POST" && !empty($_POST['RefPermissionsActions'])) {
            $this->managers->getManagerOf("Users")->addPermissionsActions();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeAdd(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajout d'un utilisateur"); // Titre de la page

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Users")->addUsers();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeUpdate(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification d'un utilisateur"); // Titre de la page
        $user = $this->managers->getManagerOf("Users")->getUnique($request->getData('id'));
        $this->page->addVar("user", $user);
        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Users")->updateUsers();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Users")->deleteUsers($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect('/pannel/index');
    }


    public function executeConfigurations(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Configuration"); // Titre de la page

        $typecourrier = $this->managers->getManagerOf('Courrier')->getTypeCourrierList();
        $this->page->addVar("typecourrier", $typecourrier);

        $typedemandes = $this->managers->getManagerOf('Demande')->getDemandeList();
        $this->page->addVar("typedemandes", $typedemandes);

        $typeservices = $this->managers->getManagerOf('Employe')->getService();
        $this->page->addVar("typeservices", $typeservices);

        $statutdemandes = $this->managers->getManagerOf('Demande')->getStatutDemandeList();
        $this->page->addVar("statutdemandes", $statutdemandes);
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }


    public function executeAddTypeCourrier(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajout d'un type de courrier"); // Titre de la page

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Courrier")->addTypeCourrier();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeEdittypecourrier(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification d'un type de courrier"); // Titre de la page
        $typecourrier = $this->managers->getManagerOf('Courrier')->getUniqueTypeCourrier($request->getData('id'));
        $this->page->addVar("typecourrier", $typecourrier);

        if ($request->method() == "POST" && !empty($_POST['RefType'])) {
            $this->managers->getManagerOf('Courrier')->updateTypeCourrier();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }
    public function executedeletetypecourrier(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Courrier')->deleteTypeCourrier($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect('/pannel/configurations/index');
    }

    public function executeAddTypeDemande(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajout d'un type de demande"); // Titre de la page

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Demande")->addTypeDemande();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeEditTypeDemande(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification d'un type de demande"); // Titre de la page
        $typedemande = $this->managers->getManagerOf('Demande')->getUniqueTypeDemande($request->getData('id'));
        $this->page->addVar("typedemande", $typedemande);

        if ($request->method() == "POST" && !empty($_POST['RefTypeDemande'])) {
            $this->managers->getManagerOf('Demande')->editTypeDemande();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }
    public function executeDeleteTypeDemande(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Demande')->deleteTypeDemande($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect('/pannel/configurations/index');
    }


    public function executeAddService(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Service"); // Titre de la page
        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Employe")->addService();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }


    public function executeEditService(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier un Service"); // Titre de la page
        $service = $this->managers->getManagerOf('Employe')->getUniqueService($request->getData('id'));
        $this->page->addVar("service", $service);

        if ($request->method() == "POST" && !empty($_POST['RefService'])) {
            $this->managers->getManagerOf('Employe')->editService();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeDeleteService(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Employe')->deleteService($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect('/pannel/configurations/index');
    }

    public function executeAddStatutDemande(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un statut de demande"); // Titre de la page

        $typedemandes = $this->managers->getManagerOf('Demande')->getDemandeList();
        $this->page->addVar("typedemandes", $typedemandes);

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Demande")->addStatutDemande();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }




    public function executeEditStatutDemande(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier un statut de demande"); // Titre de la page
        $statutdemande = $this->managers->getManagerOf('Demande')->getUniqueStatutDemande($request->getData('id'));
        $this->page->addVar("statutdemande", $statutdemande);
        $typedemandes = $this->managers->getManagerOf('Demande')->getDemandeList();
        $this->page->addVar("typedemandes", $typedemandes);

        if ($request->method() == "POST" && !empty($_POST['RefStatutDemande'])) {
            $this->managers->getManagerOf('Demande')->editStatutDemande();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/pannel/configurations/index');
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }


    public function executedeleteStatutDemande(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Demande')->deleteStatutDemande($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect('/pannel/configurations/index');
    }
}