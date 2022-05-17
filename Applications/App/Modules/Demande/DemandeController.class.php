<?php

namespace Applications\App\Modules\Demande;

class DemandeController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Demande "); // Titre de la page
        $demandes =  $this->managers->getManagerOf("Demande")->getDemandeList();
        $this->page->addVar("demandes", $demandes);
        if ($request->method() == 'POST' && $request->postData('RefTypeDemande')) {
            $this->managers->getManagerOf('Demande')->addDemande();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/demande/index');
        }
        $mesdemandes = $this->managers->getManagerOf("Demande")->getMesDemandes();
        $this->page->addVar("mesdemandes", $mesdemandes);
    }

    public function executeDisplay(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Details de la demande "); // Titre de la page
        $demande =  $this->managers->getManagerOf("Demande")->getSingleDemande($request->getData('id'));
    }
}