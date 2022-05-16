<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header">
                <a href="/admin/entreprises/add_pole" class="btn btn-primary waves-effect waves-light" style="position: absolute;right: 0px;margin-top: 13px;margin-right: 10px;">Ajouter</a>
            </div>
            <div class="card-body">

                <h4 class="card-title">Liste des Poles d'Activites</h4>
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                        <tr>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($poles as $key => $value) { ?>
                            <tr>
                                <td><?= $value['Nom']; ?></td>
                                <td class="td-actions">
                                    <a href="/admin/entreprises/polesactivites/update/<?= $value['RefPoleActivite']; ?>" class="btn btn-success waves-effect waves-light"><i class="fa fa-edit">
                                        </i></a>
                                    <a href="/admin/entreprises/delete_pole/<?= $value['RefPoleActivite']; ?>" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i class="fa fa-trash-alt"> </i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>