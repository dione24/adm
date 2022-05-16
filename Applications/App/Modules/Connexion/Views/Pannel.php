<div class="row">
    <div class="col-12">

        <div class="card">

            <div class="card-body">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target="#myModal">Ajouter</button>
                <br /><br />
                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                    <thead>
                        <tr>
                            <th>login</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ListeUsers as $key => $value) { ?>
                        <tr>
                            <td><?= $value['login']; ?></td>
                            <td><?= $value['nom']; ?></td>
                            <td><?= $value['prenom']; ?></td>
                            <td><?= $value['name_status']; ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<!---modalAddUsers--->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add Debiteur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/addUsers">
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Login </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="horizontal-firstname-input" name="login"
                                required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nom </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="horizontal-firstname-input" name="nom" required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Prenom </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="horizontal-firstname-input" name="prenom"
                                required>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="horizontal-email-input" name="email">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="horizontal-password-input" name="password"
                                required>
                        </div>
                        <input type="hidden" class="form-control" value="7" name="id_status" required>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Valider</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>