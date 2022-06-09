 <div class="row">
     <div class="col-xl-2 col-sm-3">
         <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
             <a class="nav-link activewq" id="v-pills-payment-tab" data-bs-toggle="pill" href="#v-pills-payment"
                 role="tab" aria-controls="v-pills-payment" aria-selected="false">
                 <i class="bx bx-money d-block check-nav-icon mt-4 mb-2"></i>
                 <p class="fw-bold mb-4">Mes Demandes</p>
             </a>

             <a class="nav-link " id="v-pills-shipping-tab" data-bs-toggle="pill" href="#v-pills-shipping" role="tab"
                 aria-controls="v-pills-shipping" aria-selected="true">
                 <i class="bx bxs-truck d-block check-nav-icon mt-4 mb-2"></i>
                 <p class="fw-bold mb-4">Nouvelle Demande</p>
             </a>
             <?php if (in_array(25, $permission)) { ?>
             <a class="nav-link" id="v-pills-confir-tab" data-bs-toggle="pill" href="#v-pills-confir" role="tab"
                 aria-controls="v-pills-confir" aria-selected="false">
                 <i class="bx bx-badge-check d-block check-nav-icon mt-4 mb-2"></i>
                 <p class="fw-bold mb-4">Mes Traitements</p>
             </a>
             <?php } ?>
         </div>
     </div>
     <div class="col-xl-10 col-sm-9">
         <div class="card">
             <div class="card-body">
                 <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-payment" role="tabpanel"
                         aria-labelledby="v-pills-payment-tab">
                         <div>
                             <h4 class="card-title">Mes Demandes</h4>
                             <p class="card-title-desc"></p>

                             <div class="card">
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table id="dataTable" class="table align-middle table-nowrap mb-0">
                                             <thead class="table-light">
                                                 <tr>
                                                     <th class="align-middle">Date</th>
                                                     <th class="align-middle">Type</th>
                                                     <th class="align-middle">Libele</th>
                                                     <th class="align-middle">Statut</th>
                                                     <th class="align-middle">Afficher</th>
                                                     <th class="align-middle">Action</th>

                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php foreach ($mesdemandes as $key => $demande) { ?>
                                                 <tr>
                                                     <td><?= $demande['date_demande']; ?></td>
                                                     <td><?= $demande['name_demande'];  ?>
                                                     </td>

                                                     <td><?= $demande['libele']; ?></td>
                                                     <td><span
                                                             class="btn btn-<?= $demande['color']; ?>"><?= $demande['name_statut_demande']; ?></span>
                                                     </td>
                                                     <td><a href="/demande/display/<?= $demande['RefDemande']; ?>"
                                                             target="_blank">
                                                             <i class="fas fa-eye"></i>
                                                         </a></td>
                                                     <td class="td-actions">
                                                         <?php if ($demande['statut_demande'] == 1) { ?>
                                                         <a href="/demande/update/<?= $demande['RefDemande']; ?>"
                                                             class="btn btn-success waves-effect waves-light"><i
                                                                 class="fa fa-edit"> </i></a>
                                                         <a href="/demande/delete/<?= $demande['RefDemande'];  ?>"
                                                             class="btn btn-danger waves-effect waves-light"
                                                             onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                                                 class="fa fa-trash-alt"> </i></a>
                                                         <?php } ?>
                                                     </td>
                                                 </tr>

                                                 <?php } ?>

                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="tab-pane fade " id="v-pills-shipping" role="tabpanel"
                         aria-labelledby="v-pills-shipping-tab">
                         <div>
                             <h4 class="card-title">Nouvelle Demande </h4>
                             <p class="card-title-desc">Veuillez Remplir la demande</p>
                             <form method="POST" enctype="multipart/form-data">
                                 <div class="form-group row mb-4">
                                     <label for="billing-name" class="col-md-2 col-form-label">Libele</label>
                                     <div class="col-md-10">
                                         <input type="text" class="form-control" id="billing-name" name="libele"
                                             required>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-4">
                                     <label for="billing-address" class="col-md-2 col-form-label">Note</label>
                                     <div class="col-md-10">
                                         <textarea class="form-control" id="billing-address" rows="3" name="note"
                                             placeholder="Description" required></textarea>
                                     </div>
                                 </div>
                                 <div class="form-group row mb-4">
                                     <label class="col-md-2 col-form-label">Type Demande</label>
                                     <div class="col-md-10">
                                         <select class="form-control select2" name="RefTypeDemande" required>
                                             <option>Choisir</option>
                                             <?php foreach ($demandes as $key => $value) { ?>
                                             <option value="<?= $value['RefTypeDemande']; ?>">
                                                 <?= $value['name_demande']; ?></option>
                                             <?php } ?>
                                         </select>
                                     </div>
                                 </div>

                                 <div class="form-group row mb-4">
                                     <label for="billing-name" class="col-md-2 col-form-label">Fichier</label>
                                     <div class="col-md-10">
                                         <input type="file" class="form-control" id="billing-name" name="file">
                                     </div>
                                 </div>
                                 <button class="btn btn-success" type="submit"> Valider</button>
                             </form>
                         </div>
                     </div>
                     <?php if (in_array(25, $permission)) { ?>
                     <div class="tab-pane fade" id="v-pills-confir" role="tabpanel"
                         aria-labelledby="v-pills-confir-tab">
                         <div class="card shadow-none border mb-0">
                             <div>
                                 <h4 class="card-title">Mes Traitements</h4>
                                 <p class="card-title-desc"></p>
                                 <div class="card">
                                     <div class="card-body">
                                         <div class="table-responsive">
                                             <table id="dataTable" class="table align-middle table-nowrap mb-0">
                                                 <thead class="table-light">
                                                     <tr>
                                                         <th class="align-middle">Date</th>
                                                         <th class="align-middle">Type</th>
                                                         <th class="align-middle">Libele</th>
                                                         <th class="align-middle">Statut</th>
                                                         <th class="align-middle">Afficher</th>
                                                         <th class="align-middle">Action</th>

                                                     </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php foreach ($mesvalidation as $validations) {
                                                                foreach ($validations['alldemande'] as $key => $validation) {
                                                            ?>
                                                     <tr>
                                                         <td><?= $validation['date_demande']; ?></td>
                                                         <td><?= $validation['name_demande'];  ?>
                                                         </td>
                                                         <td><?= $validation['libele']; ?></td>
                                                         <td><span
                                                                 class="btn btn-<?= $validation['color']; ?>"><?= $validation['name_statut_demande']; ?></span>
                                                         </td>

                                                         <td><a href="/demande/display/<?= $validation['RefDemande']; ?>"
                                                                 target="_blank">
                                                                 <i class="fas fa-eye"></i>
                                                             </a></td>

                                                         <td class="td-actions">

                                                             <?php if (in_array($validation['statut_demande'], $permissionsStatut) && $validation['statut_demande'] != ($validation['lastStatus'] - 1)) { ?>
                                                             <a href="/demande/approv/<?= $validation['RefDemande']; ?>/<?= $validation['statut_demande']; ?>"
                                                                 class="btn btn-success waves-effect waves-light"><i
                                                                     class="fas fa-arrow-alt-circle-right"> </i></a>
                                                             <a href="/demande/cancel/<?= $validation['RefDemande'];  ?>/<?= $validation['RefTypeDemande']; ?>"
                                                                 class="btn btn-danger waves-effect waves-light"
                                                                 onclick="return confirm('Voulez-vous vraiment rejete cette demande ?');"><i
                                                                     class="fas fa-arrow-alt-circle-left"> </i></a>
                                                             <?php }  ?>

                                                         </td>
                                                     </tr>
                                                     <?php }
                                                            } ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <?php } ?>
                 </div>
             </div>
             <div class="row mt-4">
                 <div class="col-sm-6">
                     <a href="/home" class="btn text-muted d-none d-sm-inline-block btn-link">
                         <i class="mdi mdi-arrow-left me-1"></i>Retour </a>
                 </div> <!-- end col -->
                 <!-- end col -->
             </div> <!-- end row -->
         </div>
     </div>