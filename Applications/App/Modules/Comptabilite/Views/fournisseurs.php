<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?php if (in_array(11, $permission)) { ?>

                <a href="/comptabilite/fournisseurs/add" class="btn btn-primary waves-effect waves-light"
                    style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
                <?php } ?>
            </div>
            <div class="card-body">
                <h4 class="card-title">Liste des Fournisseurs</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-120">
                    <thead>
                        <tr>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Adresse </th>
                            <th>RCCM</th>
                            <th>NIF</th>
                            <th>BANQUE</th>
                            <th>EMAIL</th>
                            <?php if (in_array(12, $permission)) { ?>
                            <th>Actions</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fournisseurs as $key => $value) { ?>
                        <tr>
                            <td><?= $value['RefFournisseur']; ?></td>
                            <td><?= $value['nomfournisseur']; ?></td>
                            <td><?= $value['adressefournisseur']; ?></td>
                            <td><?= $value['rcfournisseur']; ?></td>
                            <td><?= $value['niffournisseur']; ?></td>
                            <td><?= $value['banquefournisseur']; ?></td>
                            <td><?= $value['emailfournisseur']; ?></td>
                            <?php if (in_array(12, $permission)) { ?>
                            <td class="td-actions">
                                <a href="/comptabilite/fournisseurs/update/<?= $value['RefFournisseur']; ?>"
                                    class="btn btn-success waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                <a href="/comptabilite/fournisseurs/delete/<?= $value['RefFournisseur']; ?>"
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