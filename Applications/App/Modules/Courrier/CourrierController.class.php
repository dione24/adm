<?php

namespace Applications\App\Modules\Courrier;

class CourrierController extends \Library\BackController
{
    public function executeReceptions(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Reception"); // Titre de la page

        $receptions = $this->managers->getManagerOf('Courrier')->getListeReceptions();
        $this->page->addVar("receptions", $receptions);


        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }
    public function executeAddReceptions(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter une réception"); // Titre de la page

        if ($request->method() == 'POST' && $request->postData('object')) {
            $this->managers->getManagerOf('Courrier')->addCourrierArrive();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
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


        $permissions = array();
        $AllPermissions = $this->managers->getManagerOf('Users')->UserPermission();
        foreach ($AllPermissions as $key => $value) {
            $permissions[] = $value['access'];
        }
        $this->page->addVar('permission', $permissions);
    }

    public function executeView(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Voir un Courrier"); // Titre de la page
        $courrier = $this->managers->getManagerOf('Courrier')->getCourrierDeparts($request->getData('id'));
        $this->page->addVar("courrier", $courrier);
    }

    public function executeEditReceptions(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier un Courrier"); // Titre de la page
        $receptions = $this->managers->getManagerOf('Courrier')->getCourrierArrive($request->getData('id'));
        $this->page->addVar("receptions", $receptions);


        if ($request->method() == 'POST' && $request->postData('object')) {
            $this->managers->getManagerOf('Courrier')->editCourrierArrive();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/courrier/receptions');
        }
    }

    public function executeDeleteReceptions(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Courrier')->deleteCourrierArrive($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/courrier/receptions');
    }

    public function executeEditDeparts(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modifier un Courrier"); // Titre de la page
        $departs = $this->managers->getManagerOf('Courrier')->getCourrierDeparts($request->getData('id'));
        $this->page->addVar("departs", $departs);

        if ($request->method() == 'POST' && $request->postData('libele')) {
            $this->managers->getManagerOf('Courrier')->editCourrierDeparts();
            $_SESSION['message']['number'] = 2;
            $_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Opération effectuée.';
            $this->app()->httpResponse()->redirect('/courrier/departs');
        }
    }
    public function executeDeleteDeparts(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Courrier')->deleteCourrierDeparts($request->getData('id'));
        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        $this->app()->httpResponse()->redirect('/courrier/departs');
    }

    public function executeUploadFile(\Library\HTTPRequest $request)

    {
        $this->managers->getManagerOf("Courrier")->addFile();

        $_SESSION['message']['number'] = 2;
        $_SESSION['message']['type'] = 'success';
        $_SESSION['message']['text'] = 'Opération effectuée.';
        if ($request->postData('Type') == 1) {
            if ($request->postData('link') == 1) {
                $this->app()->httpResponse()->redirect('/home');
            } else {
                $this->app()->httpResponse()->redirect('/courrier/departs');
            }
        } else {
            $this->app()->httpResponse()->redirect('/courrier/receptions');
        }
    }
    public function executeFile_view(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Voir un fichier"); // Titre de la page


    }
}