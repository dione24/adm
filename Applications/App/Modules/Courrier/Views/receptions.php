<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">

                <a href="/courrier/receptions/add" class="btn btn-primary waves-effect waves-light"
                    style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
            </div>
            <div class="card-body">

                <h4 class="card-title">Liste des Courriers Arrivés</h4>
                <table id="datatable" class="table table-bordered dt-responsive ">
                    <thead>
                        <tr>
                        <tr>
                            <th>#</th>
                            <th>Objet</th>
                            <th>Emetteur</th>
                            <th>Date</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($receptions as $key => $value) {  ?>
                        <tr>
                            <td><?= $value['RefArrive']; ?></td>
                            <td> <?= $value['object'];  ?>
                            </td>
                            <td> <?= $value['enterprise'];  ?>
                            </td>
                            <td> <?= date("d/m/Y", strtotime($value['date_arrivee']));  ?>
                            </td>
                            <td> <a <?php if (!empty($value['verify'])) { ?>
                                    href="/documents/<?= $value['FileArrive']; ?>" target="_blank"
                                    class="btn btn-primary" <?php } else { ?>
                                    class="btn btn-warning btn-block waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target="#composemodal-<?= $value['RefArrive']; ?>" <?php } ?>>
                                    <i class="fa fa-file"></i><a /></td>
                            <td class="td-actions">
                                <a href="/courrier/receptions/update/<?= $value['RefArrive']; ?>"
                                    class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                <a href="/courrier/receptions/delete/<?= $value['RefArrive'];  ?>"
                                    class="btn btn-danger waves-effect waves-light"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                        class="fa fa-trash-alt"> </i></a>
                            </td>


                            <!-- Modal -->
                            <div class="modal fade" id="composemodal-<?= $value['RefArrive']; ?>" tabindex="-1"
                                role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="composemodalTitle">Joindre le document</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST">
                                            <div class="modal-body">
                                                <div>
                                                    <input type="hidden" value="<?= $value['RefArrive']; ?>"
                                                        name="RefArrive">
                                                    <input type="hidden" value="2" name="Type">
                                                    <input type="file" name="Courrier_File" class="form-control"
                                                        required="" />

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
<!-- Modal -->

<!-- end modal -->