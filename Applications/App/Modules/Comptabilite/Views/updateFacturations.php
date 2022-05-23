<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifier la Facture</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Demande</label>
                        <div class="col-lg-10">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="RefDemande"
                                placeholder="Type to search..." autocomplete="OFF"
                                value="<?php if (isset($facture['RefDemande'])) {
                                                                                                                                                                                    echo $facture['RefDemande']; ?> <?php } ?>">
                            <datalist id="datalistOptions">
                                <?php foreach ($mesvalidation as $validations) {
                                    foreach ($validations['alldemande'] as $key => $validation) {
                                        if ($validation['payement'] != 1) {
                                ?>
                                <option value=" <?= $validation['RefDemande']; ?> ">
                                    <?= $validation['uniqid'] . " | " .  $validation['libele'] . " | " . $validation['infodemandeur']['nomEmploye'] . " |" . $validation['date_demande']; ?>
                                </option>
                                <?php }
                                    }
                                } ?>
                            </datalist>
                        </div>
                    </div>
                    <input type="hidden" name="RefFacture" value="<?= $facture['RefFacture'] ?>">
                    <div class=" row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">N° Facture</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="numfacture" type="text" class="form-control"
                                value="<?= $facture['numfacture']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Libele</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="libele" type="text" class="form-control"
                                value="<?= $facture['libele']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Date</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="datefacture" type="date" class="form-control"
                                value="<?= $facture['datefacture']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Fournisseur</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="RefFournisseur">
                                <option value="">Selectionner un fournisseur</option>
                                <?php foreach ($fournisseurs as $fournisseur) {  ?>
                                <option value="<?= $fournisseur['RefFournisseur']; ?>"
                                    <?php if ($fournisseur['RefFournisseur'] == $facture['RefFournisseur']) { ?>
                                    selected <?php } ?>>
                                    <?= $fournisseur['nomfournisseur'];  ?>
                                </option>
                                <?php  }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Date D'Echeance</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="echeance" type="date" class="form-control"
                                value="<?= $facture['echeance']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Montant HT</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="montantht" type="text" class="form-control"
                                value="<?= $facture['montantht']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">TVA</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="tva" type="text" class="form-control"
                                value="<?= $facture['tva']; ?>">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Montant TTC </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="montantttc" type="text" class="form-control"
                                value="<?= $facture['montantttc']; ?>" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Fichier </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="file" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Valider</button>
                            <a href="/comptabilite/facturations" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>