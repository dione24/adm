<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter une entreprise</h4></br>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="nom"
                                placeholder="Veillez saisir le nom de l'entreprise..." id="example-text-input" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-2 col-form-label">Poles d'Activités</label>
                        <div class="col-md-6">
                            <select class="form-select" name="pole" required>
                                <option value="">Pôle d'activités</option>
                                <?php foreach ($poles as $key => $value) { ?>
                                <option value="<?= $value['RefPoleActivite']; ?>"><?= $value['Nom']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/admin/entreprises/liste" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>