<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="/employe/add" class="btn btn-primary waves-effect waves-light"
                    style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
            </div>
            <div class="card-body">

                <h4 class="card-title">Liste des Employés</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-120">
                    <thead>
                        <tr>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenom </th>
                            <th>Poste</th>
                            <th>Telephone</th>
                            <th>Age</th>
                            <th>Genre</th>
                            <th>Service</th>
                            <th>Email</th>
                            <?php if (in_array(7, $permission)) { ?>
                            <th>Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($employe as $key => $value) { ?>
                        <tr>
                            <td><?= $value['Matricule']; ?></td>
                            <td><?= $value['nomEmploye']; ?></td>
                            <td><?= $value['prenomEmploye']; ?></td>
                            <td><?= $value['posteEmploye']; ?></td>
                            <td><?= $value['telephoneEmploye']; ?></td>
                            <td><?= $value['ageEmploye']; ?></td>
                            <td><?= $value['name_genre']; ?></td>
                            <td><?= $value['name_service']; ?></td>
                            <td><?= $value['emailEmploye']; ?></td>
                            <?php if (in_array(7, $permission)) { ?>

                            <td class="td-actions">
                                <a href="/employe/update/<?= $value['RefEmploye']; ?>"
                                    class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                <a href="/employe/delete/<?= $value['RefEmploye']; ?>"
                                    class="btn btn-danger waves-effect waves-light"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                        class="fa fa-trash-alt"> </i></a>
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#linkUsers-<?= $value['RefEmploye']; ?>">
                                    <i class="fas fa-link"></i> User</button>
                            </td>
                            <?php } ?>
                            <div class="modal fade" id="linkUsers-<?= $value['RefEmploye']; ?>" tabindex="-1"
                                role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                <div class="modal-dialog " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="composemodalTitle">Link to Users</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST">
                                            <div class="form-control">
                                                <div class="col-md-10">
                                                    <div class="mb-3">
                                                        <label for="validationCustom03" class="form-label">Users</label>
                                                        <select class="form-select" id="validationCustom03" required=""
                                                            name="RefUsers">
                                                            <option selected="" disabled="" value="">Choose...</option>
                                                            <?php foreach ($users as $key => $user) { ?>
                                                            <option value="<?= $user['RefUsers']; ?>">
                                                                <?= $user['login'] . ' | ' . $user['nom'] . ' | ' . $user['prenom']; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" value="<?= $value['RefEmploye']; ?>" name="RefEmploye">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Valider <i
                                                        class="fab fa-telegram-plane ms-1"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>