<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajout d'un courrier Arrivé </h4></br>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Libele</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="libele" id=" example-text-input"
                                value="<?= $demande['libele']; ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Note</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="note" rows="3" required>
                              <?= $demande['note']; ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Type Demande</label>
                        <div class="col-md-6">
                            <select class="form-control select2" name="RefTypeDemande" required>
                                <option>Choisir</option>
                                <?php foreach ($demandes as $key => $value) { ?>
                                <option value="<?= $value['RefTypeDemande']; ?>" <?php if ($demande['RefTypeDemande'] == $value['RefTypeDemande']) {
                                                                                            echo 'selected';
                                                                                        } ?>>
                                    <?= $value['name_demande']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">File</label>
                        <div class="col-md-6">
                            <input class="form-control" type="file" name="file"
                                value="/documents/<?= $demande['file']; ?>">
                        </div>
                        <input type="hidden" value="<?= $demande['RefDemande']; ?>" name="RefDemande">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/demande/index" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>