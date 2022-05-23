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
                            <th>Access</th>
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
                            <td> <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalDroit-<?= $value['RefUsers']; ?>">
                                    <i class="fas fa-lock"></i> Courrier</button> </td>
                            </td>
                            <td><button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#PermissionsAction-<?= $value['RefUsers']; ?>">
                                    <i class="fas fa-lock"></i> Permissions</button> </td>
                            </td>
                            <td><button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#StatutApprobation-<?= $value['RefUsers']; ?>">
                                    <i class="fas fa-lock"></i> Statut</button> </td>
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
                                        <h5 class="modal-title" id="composemodalTitle">Changer le statut</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="form-control">
                                            <?php foreach ($chmodCourrier as $key => $chmod) {
                                                    $VerifyChmod = $functions->VerifyChmod($chmod['RefType'], $value['RefUsers']);
                                                ?>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input multiple="" type="checkbox"
                                                            value="<?= $chmod['RefType']; ?>" name="RefType[]"
                                                            <?php if ($chmod['RefType'] == $VerifyChmod['RefType']) { ?>
                                                            checked="" <?php } ?>>
                                                        <?= $chmod['name_type']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" value="<?= $value['RefUsers']; ?>" name="RefUsers">

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


                        <div class="modal fade" id="StatutApprobation-<?= $value['RefUsers']; ?>" tabindex="-1"
                            role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="composemodalTitle">Changer le statut</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="form-control">
                                            <?php foreach ($getDemandeList as $key => $denande) {
                                                ?>

                                            <div class="form-check-info mb-3">
                                                <input multiple="" type="checkbox"
                                                    value="<?= $denande['RefTypeDemande']; ?>" name="RefTypeDemande[]">
                                                <label class="form-check-label" for="formCheck1">
                                                    <?= $denande['name_demande']; ?>
                                                </label>
                                            </div>
                                            <ul>
                                                <?php foreach ($denande['StatutTypeDemande'] as $key => $statut) {
                                                            $verifyStatut = $functions->verifyStatut($statut['RefStatutDemande'], $value['RefUsers']);

                                                        ?>
                                                <li>
                                                    <div class="form-check form-check-primary mb-3">
                                                        <input multiple="" type="checkbox"
                                                            value="<?= $statut['RefStatutDemande']; ?>"
                                                            name="RefStatutDemande[]"
                                                            <?php if ($statut['RefStatutDemande'] == $verifyStatut['name_approv']) { ?>
                                                            checked="" <?php } ?>>
                                                        <label class="form-check-label" for="formCheckcolor1">
                                                            <?= $statut['name_statut_demande']; ?>
                                                        </label>
                                                    </div>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" value="<?= $value['RefUsers']; ?>" name="RefUsers">
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

                        <div class="modal fade" id="PermissionsAction-<?= $value['RefUsers']; ?>" tabindex="-1"
                            role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="composemodalTitle">Changer le statut</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form method="POST">
                                        <div class="form-control">
                                            <?php foreach ($ListPermissionsActions as $key => $actions) {
                                                    $verifyStatutPermissionsActions = $functions->verifyStatutPermissionsActions($value['RefUsers'], $actions['RefPermissionsActions']);
                                                ?>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <input multiple="" type="checkbox"
                                                            value="<?= $actions['RefPermissionsActions']; ?>"
                                                            name="RefPermissionsActions[]"
                                                            <?php if ($actions['RefPermissionsActions'] == $verifyStatutPermissionsActions['access']) { ?>
                                                            checked="" <?php } ?>>
                                                        <?= $actions['name_permissions_actions']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <input type="hidden" value="<?= $value['RefUsers']; ?>" name="RefUsers">

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
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>