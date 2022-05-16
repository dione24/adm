<?php

namespace Applications\App\Modules\Pannel;

class PannelController extends \Library\BackController
{
    public function executeHome(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Gestion des Utilisateurs"); // Titre de la page


    }
}