<?php

namespace Applications\App\Modules\Comptabilite;

class ComptabiliteController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil"); // Titre de la page

        $getDecaissement = $this->managers->getManagerOf('Comptabilite')->getDecaissement();
        $this->page->addVar("getDecaissement", $getDecaissement);
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

        if ($request->method() == "POST") {
            $this->managers->getManagerOf("Comptabilite")->updateDecaissement($request);
            $this->app->httpResponse()->redirect("/comptabilite/index");
        }
    }

    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Comptabilite")->deleteDecaissement($request->getData('id'));
        $this->app->httpResponse()->redirect("/comptabilite/index");
    }
}