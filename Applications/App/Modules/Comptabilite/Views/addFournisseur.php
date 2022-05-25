<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Enregistrer un Nouveau Fournisseur</h4>
                <form method="POST" enctype="multipart/form-data">

                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Nom du Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="nomfournisseur" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Adresse Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="adressefournisseur" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Contact Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="contactfournisseur" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">RCCM Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="rcfournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">NIF Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="niffournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectname" class="col-form-label col-lg-2">Banque Fournisseur</label>
                        <div class="col-lg-10">
                            <input id="projectname" name="banquefournisseur" type="text" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="projectbudget" class="col-form-label col-lg-2">Email Fournisseur </label>
                        <div class="col-lg-10">
                            <input id="projectbudget" name="emailfournisseur" type="email" class="form-control"
                                autocomplete="OFF">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <button type="submit" class="btn btn-success">Valider</button>
                            <a href="/comptabilite/fournisseurs" class="btn btn-danger">Annuler</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>