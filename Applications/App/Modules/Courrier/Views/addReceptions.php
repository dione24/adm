<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajout d'un courrier Arrivé </h4></br>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="enterprise"
                                placeholder="Veillez saisir le nom de l'emetteur " id=" example-text-input" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Objet</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="object" placeholder="Veillez saisir l'objet "
                                id=" example-text-input" required>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/courrier/receptions" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>