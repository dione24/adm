<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">

                <a href="/home" class="btn btn-primary waves-effect waves-light"
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
                            <th>Date</th>
                            <?php
                            if (in_array(1, $permission)) { ?>
                            <th>File</th>
                            <?php }
                            if (in_array(2, $permission)) { ?>
                            <th>Action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($departs as $key => $value) {  ?>
                        <tr>
                            <td>
                                <?= $value['numero_courrier']; ?>/<?= $value['shortName']; ?>-<?= date('Y', strtotime($value['date_sortie'])) ?>-MLC

                            </td>
                            <td> <?php if (strlen($value['libele']) > 30) { ?> <a
                                    href="/courrier/departs/view/<?= $value['RefCourrier']; ?>"> <i
                                        class="fa fa-eye"></i></a><?php } else {
                                                                                                                                                                                echo $value['libele'];
                                                                                                                                                                            } ?>
                            </td>
                            <td> <?= date("d/m/Y", strtotime($value['date_sortie']));  ?>
                            </td>
                            <?php if (in_array(1, $permission)) { ?>
                            <td> <a <?php if (!empty($value['verify'])) { ?> href="/documents/<? //= $value['FileDepart']; 
                                                                                                        ?>"
                                    target="_blank" class="btn btn-primary" <?php } else { ?>
                                    class="btn btn-warning btn-block waves-effect waves-light" data-bs-toggle="modal"
                                    data-bs-target="#composemodal-<?= $value['RefCourrier']; ?>" <?php } ?>>
                                    <i class="fa fa-file"></i><a /></td> <?php } ?>
                            <?php if (in_array(2, $permission)) { ?>
                            <td class="td-actions">
                                <a href="/courrier/departs/update/<?= $value['RefCourrier']; ?>"
                                    class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                <a href="/courrier/departs/delete/<?= $value['RefCourrier'];  ?>"
                                    class="btn btn-danger waves-effect waves-light"
                                    onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                        class="fa fa-trash-alt"> </i></a>
                            </td>
                            <?php } ?>


                            <!-- Modal -->
                            <div class="modal fade" id="composemodal-<?= $value['RefCourrier']; ?>" tabindex="-1"
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
                                                    <input type="hidden" value="<?= $value['RefCourrier']; ?>"
                                                        name="RefCourrier">
                                                    <input type="hidden" value="1" name="Type">
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