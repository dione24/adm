<?php

namespace Applications\App\Modules\Administrer;

class AdministrerController extends \Library\BackController
{
    public function executeListe(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Entreprises");
        $entreprises =  $this->managers->getManagerOf('Administrer')->ListeEnteprise();
        $this->page->addVar("entreprises", $entreprises);
    }
    public function executeAddEntreprise(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter une Entreprise");
        $poles =  $this->managers->getManagerOf('Administrer')->ListePole();
        $this->page->addVar("poles", $poles);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addEntreprise($request);
            $this->app()->httpResponse()->redirect("/admin/entreprises/liste");
        }
    }

    public function executeDeleteEnterprise(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Administrer')->deleteEnterprise($request->getData('id'));
        $this->app()->httpResponse()->redirect('/admin/entreprises/liste');
    }

    public function executePole(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Poles d'Activites ");
        $poles =  $this->managers->getManagerOf('Administrer')->ListePole();
        $this->page->addVar("poles", $poles);
    }
    public function executeAddPole(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter une Entreprise");
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addPole($request);
            $this->app()->httpResponse()->redirect("/admin/entreprises/poleactivite");
        }
    }

    public function executeDeletepole(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Administrer')->deletePole($request->getData('id'));
        $this->app()->httpResponse()->redirect('/admin/entreprises/poleactivite');
    }
}