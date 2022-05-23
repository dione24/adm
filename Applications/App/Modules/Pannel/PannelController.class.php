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
    }
}