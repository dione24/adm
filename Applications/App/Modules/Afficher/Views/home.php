<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-primary bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-primary p-3">
                            <h5 class="text-primary">Bienvenue !</h5>
                            <p><?= (($_SESSION['Nom'] . ' ' . $_SESSION['Prenom'])); ?> </p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="/images/mlc.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-6">Accès rapide
                </h4>
                <div class="row">
                    <?php if (in_array(23, $permission)) { ?>
                    <div class="col-xl-6">
                        <a class="text-muted" data-bs-toggle="modal" data-bs-target="#newreference">
                            <div class="text-center ">
                                <i class="far fa-paper-plane h1"></i>
                                <p class="mt-2 mb-0">Nouvelle Référence </p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if (in_array(24, $permission)) { ?>
                    <div class="col-xl-6">
                        <a href="/courrier/receptions/add" class=" text-muted">
                            <div class="text-center">
                                <i class="mdi mdi-folder-plus h1"></i>
                                <p class="mt-2 mb-0">Courrier Arrivé</p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <?php if (in_array(9, $permission)) { ?>
                    <div class="col-xl-6">
                        <a href="/demande/index" class="text-muted">
                            <div class="text-center">
                                <i class="fas fa-question-circle h1"></i>
                                <p class="mt-2 mb-0">Demandes</p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if (in_array(10, $permission)) { ?>
                    <div class="col-xl-6">
                        <a href="/comptabilite/facturations" class=" text-muted">
                            <div class="text-center">
                                <i class="fas fa-file-invoice h1"></i>
                                <p class="mt-2 mb-0">Factures</p>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>


    </div>
    <div class="col-xl-8">
        <?php if (isset($_GET['numero']) && isset($_GET['typecourrier'])) { ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center">
                            <p hidden id="p1">
                                <?= $displayNumero['numero_courrier']; ?>/<?= $displayNumero['shortName']; ?>-<?= date('Y', strtotime($displayNumero['date_sortie'])) ?>-MLC
                            </p>
                            La Référence est :
                            <strong><?= $displayNumero['numero_courrier']; ?>/<?= $displayNumero['shortName']; ?>-<?= date('Y', strtotime($displayNumero['date_sortie'])) ?>-MLC</strong>
                            <button class="btn btn-outline-success" onclick="copyToClipboard('p1')"><i
                                    class="fas fa-copy"> Copy</i></button>
                        </h5>
                    </div>

                </div>
            </div>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> Mes Références </h4>
                    <div class="table-responsive">
                        <table id="dataTable" class="table align-middle table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">Reference</th>
                                    <th class="align-middle">Objet</th>
                                    <th class="align-middle">File</th>
                                    <th class="align-middle">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mesreferences as $key => $value) {    ?>
                                <tr>
                                    <td>
                                        <h6 class="font-weight-normal mb-0">
                                            <?= $value['numero_courrier']; ?>/<?= $value['shortName']; ?>-<?= date('Y', strtotime($value['date_sortie'])) ?>-MLC
                                        </h6>

                                    </td>
                                    <td> <?php if (strlen($value['libele']) > 30) { ?> <a
                                            href="/courrier/departs/view/<?= $value['RefCourrier']; ?>"> <i
                                                class="fa fa-eye"></i></a><?php } else {

                                                                                                                                                                                        echo $value['libele'];
                                                                                                                                                                                    } ?>
                                    </td>
                                    <td> <a <?php if (!empty($value['verify'])) { ?> href="/documents/<?= $value['FileDepart'];
                                                                                                            ?>"
                                            target="_blank" class="btn btn-primary" <?php } else { ?>
                                            class="btn btn-warning btn-block waves-effect waves-light"
                                            data-bs-toggle="modal"
                                            data-bs-target="#composemodal-<?= $value['RefCourrier']; ?>" <?php } ?>>
                                            <i class="fa fa-file"></i><a />
                                    </td>
                                    <td>
                                        <h6 class="font-weight-normal mb-0">
                                            <?= date('d-m-Y', strtotime($value['date_sortie'])); ?>
                                        </h6>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="composemodal-<?= $value['RefCourrier']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="composemodalTitle">Joindre le document</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="/uploadfile" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div>
                                                        <input type="hidden" value="<?= $value['RefCourrier']; ?>"
                                                            name="RefCourrier">
                                                        <input type="hidden" value="1" name="Type">
                                                        <input type="hidden" value="1" name="link">
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

                                <?php }    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newreference" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="composemodalTitle">Référence Courrie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div>
                            <label class="typecourrier"> Type</label>
                            <select class="form-control" name="typecourrier" required="">
                                <option>Choisir</option>
                                <?php foreach ($TypeCourrier as $key => $value) { ?>
                                <option value="<?= $value['RefType']; ?>"><?= $value['name_type']; ?></option>
                                <?php } ?>
                            </select>
                            <label for="message-text" class="col-form-label">Objet:</label>
                            <textarea name="libele" class="form-control" rows="3" required></textarea>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Valider <i
                                class="fab fa-telegram-plane ms-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end modalFIle-->