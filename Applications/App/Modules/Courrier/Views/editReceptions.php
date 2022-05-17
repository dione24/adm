<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'un courrier Arrivé </h4></br>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="enterprise"
                                value="<?= $receptions['enterprise']; ?>" id=" example-text-input" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Objet</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="object" value="<?= $receptions['object']; ?>"
                                id=" example-text-input" required>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $receptions['RefArrive']; ?>" name="RefArrive">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/courrier/receptions" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>