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
        $mesvalidation =  $this->managers->getManagerOf("Demande")->getMesValidations();
        foreach ($mesvalidation as $key => $validations) {
            $mesvalidation[$key]['alldemande'] = $this->managers->getManagerOf("Demande")->getDemande($validations['name_approv']);
        }
        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Demande')->getMesValidations();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['name_approv'];
        }
        $this->page->addVar('permission', $permissions);
        $this->page->addVar("mesvalidation", $mesvalidation);
        $nombreStatutDemande = $this->managers->getManagerOf("Demande")->getNombreStatutDemande();
        $this->page->addVar("nombreStatutDemande", $nombreStatutDemande);



        $droitDecaissement = array();
        $AllPermissionsEncaissement = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissionsEncaissement as $key => $value) {
            $droitDecaissement[] = $value['access'];
        }
        $this->page->addVar('droitDecaissement', $droitDecaissement);
    }

    public function executeDisplay(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Details de la demande "); // Titre de la page
        $demande =  $this->managers->getManagerOf("Demande")->getSingleDemande($request->getData('id'));
        $this->page->addVar("demande", $demande);
        $infoDemandeur = $this->managers->getManagerOf("Demande")->getEmployeInformation($demande['RefDemandeur']);
        $this->page->addVar("infoDemandeur", $infoDemandeur);
        $commentaires = $this->managers->getManagerOf("Demande")->getDemandeObservation($request->getData('id'));
        $this->page->addVar("commentaires", $commentaires);
        $documents =  $this->managers->getManagerOf("Demande")->getDemandeDocument($request->getData('id'));
        $this->page->addVar("documents", $documents);
        $informationLog = $this->managers->getManagerOf("Demande")->getInformationLog($demande['RefDemande']);
        $this->page->addVar("informationLog", $informationLog);

        $getStatutDemande = $this->managers->getManagerOf("Demande")->getStatutDemande($demande['RefTypeDemande'], $demande['statut_demande']);
        $this->page->addVar("getStatutDemande", $getStatutDemande);

        $contentDemande = $this->managers->getManagerOf("Demande")->getContentDemande($demande['RefDemande']);
        $this->page->addVar("contentDemande", $contentDemande);
    }

    public function executeAddObservation(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->addObservation($request);
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/display/' . $request->postData('RefDemande'));
    }

    public function executeUploadFile(\Library\HTTPRequest $request)

    {
        $this->managers->getManagerOf("Demande")->uploadfile();
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/display/' . $request->postData('RefDemande'));
    }
    public function executeUpdate(\Library\HTTPRequest $request)
    {

        $this->page->addVar("titles", "Modification de la demande "); // Titre de la page
        $demande =  $this->managers->getManagerOf("Demande")->getSingleDemande($request->getData('id'));
        $this->page->addVar("demande", $demande);
        $infoDemandeur = $this->managers->getManagerOf("Demande")->getEmployeInformation($demande['RefDemandeur']);
        $this->page->addVar("infoDemandeur", $infoDemandeur);

        $demandes =  $this->managers->getManagerOf("Demande")->getDemandeList();
        $this->page->addVar("demandes", $demandes);

        if ($request->method() == "POST" && $request->postData('RefTypeDemande')) {
            $this->managers->getManagerOf("Demande")->updateDemande($request);
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/demande/index');
        }
    }

    public function executeDelete(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->delete($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/index');
    }

    public function executeApprov(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->ApprovDemande($request->getData('id'), $request->getData('statut'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/index');
    }

    public function executeCancel(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->CancelDemande($request->getData('id'), $request->getData('type'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/index');
    }

    public function executeAddFiche(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->addFiche($request);
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/display/' . $request->postData('RefDemande'));
    }

    public function executeDeletefiche(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf("Demande")->deletefiche($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/demande/display/' . $request->getData('id'));
    }
}