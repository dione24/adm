<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary">Primary</button>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-success">Success</button>
                <button type="button" class="btn btn-danger">Danger</button>
                <button type="button" class="btn btn-warning">Warning</button>
                <button type="button" class="btn btn-info">Info</button>
                <button type="button" class="btn btn-light">Light</button>
                <button type="button" class="btn btn-dark">Dark</button>

            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Modification Statut Demande </h4></br>
                    <p> NB:
                        -Premier Statut du type doit etre en attente et le dernier doit Etre Rejected
                        -Derniere Etape de validation doit etre dernier Statut Avant Rejected
                    </p>
                    <form method="POST">
                        <input type="hidden" value="<?= $statutdemande['RefStatutDemande']; ?>" name="RefStatutDemande">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Nom </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name_statut_demande"
                                    id="example-text-input" value="<?= $statutdemande['name_statut_demande']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Color </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="color" id="example-text-input"
                                    value="<?= $statutdemande['color']; ?>">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="projectname" class="col-form-label col-lg-2">Type Demande</label>
                            <div class="col-md-6">
                                <select class="form-control" name="RefTypeDemande">
                                    <option value="">Choose ..</option>
                                    <?php foreach ($typedemandes as $typedemande) { ?>
                                    <option value="<?= $typedemande['RefTypeDemande']; ?>"
                                        <?php if ($statutdemande['RefTypeDemande'] == $typedemande['RefTypeDemande']) { ?>
                                        selected <?php } ?>>
                                        <?= $typedemande['name_demande'];  ?>
                                    </option>
                                    <?php  }  ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Valider</button>
                                <a href="/pannel/configurations/index" class="btn btn-danger w-md">Annuler</a>
                            </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>