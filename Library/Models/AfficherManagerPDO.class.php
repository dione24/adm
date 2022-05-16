<?php

namespace Library\Models;



class AfficherManagerPDO extends \Library\Models\AfficherManager
{


    public function SumPayementDebiSuvi($debiteurs)
    {
        $somme = $this->dao->prepare('SELECT SUM(montant_paiement) AS MontantTotal FROM paiement WHERE (confirm_at IS NOT NULL AND reset_id IS NULL) AND  (id_debiteurs=:id_debiteurs) ');
        $somme->bindValue(':id_debiteurs', $debiteurs, \PDO::PARAM_INT);
        $somme->execute();
        $total = $somme->fetch();
        return $total['MontantTotal'];
    }
    public function PayementDebiteur($debiteurs)
    {
        $requetePaiement = $this->dao->prepare("SELECT * FROM paiement INNER JOIN debiteurs ON debiteurs.id_debiteurs=paiement.id_debiteurs WHERE (confirm_at IS NOT NULL AND reset_id IS NULL) AND  (paiement.id_debiteurs=:id_debiteurs)");
        $requetePaiement->bindValue(':id_debiteurs', $debiteurs, \PDO::PARAM_INT);
        $requetePaiement->execute();
        $resultsPaiement = $requetePaiement->fetchAll();
        return $resultsPaiement;
    }

    public function getFicheDebiteur($debiteurs)
    {
        $requete = $this->dao->prepare("SELECT * FROM   debiteurs INNER JOIN listes ON listes.id_listes=debiteurs.id_listes  RIGHT JOIN clients ON clients.id_clients=listes.id_clients LEFT JOIN paiement ON paiement.id_debiteurs=debiteurs.id_debiteurs WHERE debiteurs.id_debiteurs =:id_debiteurs");
        $requete->bindValue(':id_debiteurs', $debiteurs, \PDO::PARAM_INT);
        $requete->execute();
        $results = $requete->fetch();
        $results['MontantTotal'] = $this->SumPayementDebiSuvi($results['id_debiteurs']);
        return $results;
    }
}