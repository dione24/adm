<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="/employe/add" class="btn btn-primary waves-effect waves-light"
                    style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
            </div>
            <div class="card-body">

                <h4 class="card-title">Liste des Employés</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
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
                            </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>