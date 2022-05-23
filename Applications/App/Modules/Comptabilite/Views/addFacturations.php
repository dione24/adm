<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Enregistrer une Nouvelle Facture</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Demande</label>
                        <div class="col-lg-10">
                            <input class="form-control" list="datalistOptions" id="exampleDataList" name="RefDemande"
                                placeholder="Type to search..." autocomplete="OFF">
                            <datalist id="datalistOptions">
                                <?php foreach ($mesvalidation as $validations) {
                                    foreach ($validations['alldemande'] as $key => $validation) {
                                        if ($validation['payement'] != 1) {
                                ?>
                                <option value="<?= $validation['RefDemande']; ?> ">
                                    <?= $validation['uniqid'] . " | " .  $validation['libele'] . " | " . $validation['infodemandeur']['nomEmploye'] . " |" . $validation['date_demande']; ?>
                                </option>
                                <?php }
                                    }
                                } ?>
                            </datalist>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">N° Facture</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="numfacture" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Libele</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="libele" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Date</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="datefacture" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Fournisseur</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="RefFournisseur">
                                <option value="">Selectionner un fournisseur</option>
                                <?php foreach ($fournisseurs as $fournisseur) {  ?>
                                <option value="<?= $fournisseur['RefFournisseur'];   ?>">
                                    <?= $fournisseur['nomfournisseur'];  ?>
                                </option>
                                <?php  }  ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Echeance</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="echeance" type="date" class="form-control" autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Montant HT</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="montantht" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">TVA</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="tva" type="text" class="form-control" autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Montant TTC </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="montantttc" type="text" class="form-control"
                                autocomplete="OFF" required>
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
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Enregistrer un Fournisseur</h4>
                <form method="POST">
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Nom</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="nomfournisseur" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Adresse</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="adressefournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">RC</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="rcfournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">NIF</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="niffournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Banque </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="banquefournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Contact</label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="contactfournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Email </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="emailfournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <a href="/comptabilite/facturations" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>