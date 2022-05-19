<?php

namespace Applications\App\Modules\Pannel;

class PannelController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Gestion des Utilisateurs"); // Titre de la page
        $users = $this->managers->getManagerOf('Users')->getList();
        $this->page->addVar("users", $users);
    }
}