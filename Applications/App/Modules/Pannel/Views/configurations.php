<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste Type Courrier</h4>

                <div class="table-responsive">
                    <a href="/pannel/configurations/typercourrier/add" class="btn btn-success"><i
                            class="fas fa-plus"></i></a></br></br>
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>ShortName</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($typecourrier as $type) { ?>
                            <tr>
                                <td scope="row"><?= $type['RefType']; ?></td>
                                <td scope="row"><?= $type['name_type']; ?></td>
                                <td scope="row"><?= $type['shortName']; ?></td>
                                <td scope="row">
                                    <a href="/pannel/configurations/typecourrier/edit/<?= $type['RefType']; ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/pannel/configurations/typecourrier/delete/<?= $type['RefType']; ?>"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste Type Demande</h4>
                <div class="table-responsive">
                    <a href="/pannel/configurations/typedemande/add" class="btn btn-success"><i
                            class="fas fa-plus"></i></a></br></br>
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($typedemandes as $typedemande) { ?>
                            <tr>
                                <td scope="row"><?= $typedemande['RefTypeDemande']; ?></td>
                                <td scope="row"><?= $typedemande['name_demande']; ?></td>
                                <td scope="row">
                                    <a href="/pannel/configurations/typedemande/edit/<?= $typedemande['RefTypeDemande']; ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/pannel/configurations/typedemande/delete/<?= $typedemande['RefTypeDemande']; ?>"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste Service</h4>
                <div class="table-responsive">
                    <a href="/pannel/configurations/typeservice/add" class="btn btn-success"><i
                            class="fas fa-plus"></i></a></br></br>
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($typeservices as $typeservice) { ?>
                            <tr>
                                <td scope="row"><?= $typeservice['RefService']; ?></td>
                                <td scope="row"><?= $typeservice['name_service']; ?></td>
                                <td scope="row">
                                    <a href="/pannel/configurations/typeservice/edit/<?= $typeservice['RefService']; ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/pannel/configurations/typeservice/delete/<?= $typeservice['RefService']; ?>"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste Statut Demande</h4>
                <div class="table-responsive">
                    <a href="/pannel/configurations/statutdemande/add" class="btn btn-success"><i
                            class="fas fa-plus"></i></a></br></br>
                    <table id="dataTable" class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Color</th>
                                <th>Type Demande</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($statutdemandes as $statutdemande) { ?>
                            <tr>
                                <td scope="row"><?= $statutdemande['RefStatutDemande']; ?></td>
                                <td scope="row"><?= $statutdemande['name_statut_demande']; ?></td>
                                <td><button
                                        class="btn btn-<?= $statutdemande['color']; ?>"><?= $statutdemande['color']; ?></button>
                                </td>
                                <td><?= $statutdemande['name_demande']; ?></td>
                                <td scope="row">
                                    <a href="/pannel/configurations/statutdemande/edit/<?= $statutdemande['RefStatutDemande']; ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/pannel/configurations/statutdemande/delete/<?= $statutdemande['RefStatutDemande']; ?>"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>



    <!-- end col -->

</div>