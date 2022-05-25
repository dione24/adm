<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification Type Demande </h4></br>
                <form method="POST">
                    <input type="hidden" value="<?= $typedemande['RefTypeDemande']; ?>" name="RefTypeDemande">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label"> Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name_demande" id="example-text-input"
                                value="<?= $typedemande['name_demande']; ?>">
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