<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajout Type Courrier </h4></br>
                <form method="POST">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Name Type</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name_type" id="example-text-input" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Short Name</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="shortName" id="example-text-input" required>
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