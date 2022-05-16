<?php

namespace Applications\App\Modules\Courrier;

class CourrierController extends \Library\BackController
{
    public function executeReceptions(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Reception"); // Titre de la page

        $receptions = $this->managers->getManagerOf('Courrier')->getListeReceptions();
        $this->page->addVar("receptions", $receptions);

        if ($request->method() == 'POST' && $request->postData('Courrier_File')) {
            $this->managers->getManagerOf('Courrier')->addFile();
        }
    }
    public function executeAddReceptions(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter une réception"); // Titre de la page

        if ($request->method() == 'POST' && $request->postData('object')) {
            $this->managers->getManagerOf('Courrier')->addCourrierArrive();
            $this->app()->httpResponse()->redirect('/courrier/receptions');
        }
    }

    public function executeDeparts(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Departs"); // Titre de la page

        $departs = $this->managers->getManagerOf('Courrier')->getDeparts();
        $this->page->addVar("departs", $departs);

        if ($request->method() == 'POST' && $request->postData('Courrier_File')) {
            $this->managers->getManagerOf('Courrier')->addFile();
        }
    }

    public function executeView(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Voir un Courrier"); // Titre de la page
        $courrier = $this->managers->getManagerOf('Courrier')->getCourrierDeparts($request->getData('id'));
        $this->page->addVar("courrier", $courrier);
    }
}