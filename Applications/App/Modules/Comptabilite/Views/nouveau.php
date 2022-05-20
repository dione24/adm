<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Nouveau Decaissement</h4>
                <form method="POST">
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
                        <label for="projectname" class="col-form-label col-lg-2">Date</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="datedecaissement" type="date" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Nom Complet</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="nomcomplet" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectdesc" class="col-form-label col-lg-2">Motif</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="motifdecaissement" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Montant</label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="montantdecaissement" type="text" class="form-control"
                                autocomplete="OFF" required>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                            <a href="/comptabilite/index" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>