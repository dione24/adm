<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Modification d'un courrier </h4></br>
                <form method="POST">

                    <div class="mb-12 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Objet</label>
                        <div class="col-md-12">
                            <textarea id="summernote" class="summernote" name="libele">
                                <?= $departs['libele']; ?>
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="RefCourrier" value="<?= $departs['RefCourrier']; ?>">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/courrier/departs" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>