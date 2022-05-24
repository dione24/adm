<?php

namespace Applications\App\Modules\Afficher;

class AfficherController extends \Library\BackController
{
    public function executeHome(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil"); // Titre de la page
        $TypeCourrier = $this->managers->getManagerOf('Courrier')->getTypeCourrier();
        $this->page->addVar("TypeCourrier", $TypeCourrier);
        if (isset($_GET['typecourrier'])) {

            $displayNumero = $this->managers->getManagerOf('Courrier')->RequestNumero($_GET['typecourrier'], $_GET['numero']);
            $this->page->addVar("displayNumero", $displayNumero);
        }
        if ($request->method() == 'POST') {

            $this->managers->getManagerOf('Courrier')->addCourrierDepart();
        }
        $mesreferences = $this->managers->getManagerOf('Courrier')->getMesReferences();
        $this->page->addVar("mesreferences", $mesreferences);

        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }
}