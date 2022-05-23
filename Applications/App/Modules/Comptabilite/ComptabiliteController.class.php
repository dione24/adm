<?php

namespace Applications\App\Modules\Comptabilite;

class ComptabiliteController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil"); // Titre de la page

        $getDecaissement = $this->managers->getManagerOf('Comptabilite')->getDecaissement();
        $this->page->addVar("getDecaissement", $getDecaissement);


        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeNouveau(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Nouveau Decaissement"); // Titre de la page

        $mesvalidation =  $this->managers->getManagerOf("Demande")->getMesValidations();
        foreach ($mesvalidation as $key => $validations) {
            $mesvalidation[$key]['alldemande'] = $this->managers->getManagerOf("Demande")->getDemande($validations['name_approv']);
        }
        $this->page->addVar("mesvalidation", $mesvalidation);

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Comptabilite")->addDecaissement($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/index");
        }
    }
    public function executePrint(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Imprimer Decaissement"); // Titre de la page
        $this->page->setTemplate("decaissement");
        $getDecaissement = $this->managers->getManagerOf('Comptabilite')->getSingleDecaissement($request->getData('id'));
        $this->page->addVar("getDecaissement", $getDecaissement);
    }

    public function executeUpdate(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier Decaissement"); // Titre de la page

        $getDecaissement = $this->managers->getManagerOf('Comptabilite')->getSingleDecaissement($request->getData('id'));
        $this->page->addVar("getDecaissement", $getDecaissement);

        $mesvalidation =  $this->managers->getManagerOf("Demande")->getMesValidations();
        foreach ($mesvalidation as $key => $validations) {
            $mesvalidation[$key]['alldemande'] = $this->managers->getManagerOf("Demande")->getDemande($validations['name_approv']);
        }
        $this->page->addVar("mesvalidation", $mesvalidation);

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Comptabilite")->updateDecaissement($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/index");
        }
    }

    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Comptabilite")->deleteDecaissement($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect("/comptabilite/index");
    }


    public function executeFacturations(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Gestion des Factures"); // Titre de la page

        $getFacturations = $this->managers->getManagerOf('Comptabilite')->getFacturations();
        $this->page->addVar("getFacturations", $getFacturations);
        $statut = $this->managers->getManagerOf("Comptabilite")->getStatut();
        $this->page->addVar("statut", $statut);

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Comptabilite")->updateStatutFacture($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/facturations");
        }

        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeaddFacturations(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Nouvelle Facturation"); // Titre de la page

        $fournisseurs = $this->managers->getManagerOf('Comptabilite')->getFournisseurs();
        $this->page->addVar("fournisseurs", $fournisseurs);
        if ($request->method() == "POST" && !empty($_POST['nomfournisseur'])) {
            $this->managers->getManagerOf("Comptabilite")->addFournisseur($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/facturations");
        }

        if ($request->method() == "POST" && !empty($_POST['RefFournisseur'])) {
            $this->managers->getManagerOf("Comptabilite")->addFacturation($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/facturations");
        }

        $mesvalidation =  $this->managers->getManagerOf("Demande")->getMesValidations();
        foreach ($mesvalidation as $key => $validations) {
            $mesvalidation[$key]['alldemande'] = $this->managers->getManagerOf("Demande")->getDemande($validations['name_approv']);
        }
        $this->page->addVar("mesvalidation", $mesvalidation);
    }

    public function executeUpdateFacturations(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier la Facture"); // Titre de la page
        $fournisseurs = $this->managers->getManagerOf('Comptabilite')->getFournisseurs();
        $this->page->addVar("fournisseurs", $fournisseurs);
        $mesvalidation =  $this->managers->getManagerOf("Demande")->getMesValidations();
        foreach ($mesvalidation as $key => $validations) {
            $mesvalidation[$key]['alldemande'] = $this->managers->getManagerOf("Demande")->getDemande($validations['name_approv']);
        }
        $this->page->addVar("mesvalidation", $mesvalidation);
        $facture = $this->managers->getManagerOf('Comptabilite')->getSingleFacture($request->getData('id'));
        $this->page->addVar("facture", $facture);

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Comptabilite")->updateFacture($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app->httpResponse()->redirect("/comptabilite/facturations");
        }
    }

    public function executeDeleteFacturations(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Comptabilite")->deleteFacture($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app->httpResponse()->redirect("/comptabilite/facturations");
    }
}