<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification des informations d'un Employé</h4></br>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Matricule</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="Matricule" id="example-text-input"
                                value="<?= $employe['Matricule']; ?>">
                        </div>
                    </div>
                    <input type="hidden" name="RefEmploye" value="<?= $employe['RefEmploye']; ?>">

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="nomEmploye" id="example-text-input"
                                value="<?= $employe['nomEmploye']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Prenom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="prenomEmploye" id="example-text-input"
                                value="<?= $employe['prenomEmploye']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Telephone</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="telephoneEmploye" id="example-text-input"
                                value="<?= $employe['telephoneEmploye']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="emailEmploye" id="example-text-input"
                                value="<?= $employe['emailEmploye']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Age</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="ageEmploye" id="example-text-input"
                                value="<?= $employe['ageEmploye']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Genre</label>
                        <div class="col-md-6">
                            <select class="form-select" name="RefGenre" required>
                                <option value="">Genre</option>
                                <?php foreach ($genre as $key => $value) { ?>
                                <option value="<?= $value['RefGenre']; ?>"
                                    <?php if ($value['RefGenre'] == $employe['genreEmploye']) { ?> selected <?php } ?>>
                                    <?= $value['name_genre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Service</label>
                        <div class="col-md-6">
                            <select class="form-select" name="RefService" required>
                                <option value="">Service</option>
                                <?php foreach ($service as $key => $value) { ?>
                                <option value="<?= $value['RefService']; ?>"
                                    <?php if ($value['RefService'] == $employe['RefService']) { ?> selected <?php } ?>>
                                    <?= $value['name_service']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Poste</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="posteEmploye" id="example-text-input"
                                value="<?= $employe['posteEmploye']; ?>">
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/employe/index" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>