<?php

namespace Applications\App\Modules\Employe;

class EmployeController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Employés");
        $employe = $this->managers->getManagerOf('Employe')->getList();
        $this->page->addVar("employe", $employe);


        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);

        $users = $this->managers->getManagerOf('Users')->getList();
        $this->page->addVar("users", $users);

        if ($request->method() == "POST" && !empty($_POST['RefUsers'])) {
            $this->managers->getManagerOf('Employe')->linkUsers($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect('/employe/index');
        }
    }

    public function executeAdd(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Employé");

        $service =  $this->managers->getManagerOf("Employe")->getService();
        $genre = $this->managers->getManagerOf("Employe")->getGenre();
        $this->page->addVar("service", $service);
        $this->page->addVar("genre", $genre);

        if ($request->method() == 'POST') {

            $this->managers->getManagerOf('Employe')->add($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/employe/index');
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
        $this->page->addVar("titles", "Modifier un Employé");

        $employe = $this->managers->getManagerOf('Employe')->getEmploye($request->getData('id'));
        $this->page->addVar("employe", $employe);
        $service =  $this->managers->getManagerOf("Employe")->getService();
        $genre = $this->managers->getManagerOf("Employe")->getGenre();
        $this->page->addVar("service", $service);
        $this->page->addVar("genre", $genre);


        if ($request->method() == 'POST') {

            $this->managers->getManagerOf('Employe')->update($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/employe/index');
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
        $this->managers->getManagerOf('Employe')->delete($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/employe/index');
    }
}