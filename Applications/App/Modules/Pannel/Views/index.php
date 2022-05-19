<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="/pannel/add" class="btn btn-primary waves-effect waves-light"
                    style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
            </div>
            <div class="card-body">

                <h4 class="card-title">Liste des Utilisateurs</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prenom </th>
                            <th>Login</th>
                            <th>Statut</th>
                            <th>Roles</th>
                            <th>Permissions</th>
                            <th>P_APB</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $key => $value) { ?>
                        <tr>
                            <td><?= $value['RefUsers']; ?></td>
                            <td><?= $value['nom']; ?></td>
                            <td><?= $value['prenom']; ?></td>
                            <td><?= $value['login']; ?></td>
                            <td><?= $value['status']; ?></td>
                            <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#modalDroit-<?= $value['RefUsers']; ?>"><i
                                        class="fa fa-view"></i>Accèss</button> </td>
                            </td>
                            <td class="td-actions">
                                <a href="/pannel/update/<?= $value['RefUsers']; ?>"
                                    class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                <a href="/pannel/delete/<?= $value['RefUsers']; ?>"
                                    class="btn btn-danger waves-effect waves-light"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                        class="fa fa-trash-alt"> </i></a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDroit-<?= $value['RefUsers']; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="composemodalTitle" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="composemodalTitle">Référence Courrie</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="modal-body">
                                            <div>
                                                <label class="typecourrier"> Type</label>

                                                <label for="message-text" class="col-form-label">Objet:</label>
                                                <textarea name="libele" class="form-control" rows="3"
                                                    required></textarea>

                                            </div>
                                        </div>
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
                        <!--end modalFIle-->
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>