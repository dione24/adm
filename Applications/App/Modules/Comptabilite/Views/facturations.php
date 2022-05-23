 <div class="row">
     <div class="col-lg-12">
         <div class="">
             <div class="table-responsive">
                 <a href="/comptabilite/addFacturations" class="btn btn-primary"><i class="fas fa-plus-circle">
                     </i> Ajouter Une Facture </a>
                 <br><br>
                 <table id="dataTable" class="table project-list-table table-nowrap align-middle table-borderless">
                     <thead>
                         <tr>

                             <th class="align-middle">Statut</th>
                             <th class="align-middle">Date</th>
                             <th class="align-middle">Fournisseur</th>
                             <th class="align-middle">Libele</th>
                             <th class="align-middle">Montant</th>
                             <th class="align-middle">Echeance</th>
                             <th class="align-middle">Afficher</th>
                             <?php if (in_array(6, $permission)) { ?>
                             <th class="align-middle">Action</th>
                             <?php } ?>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($getFacturations as $facturation) { ?>
                         <tr>
                             <td>
                                 <button class="btn btn-<?= $facturation['colorStatut']; ?>"
                                     <?php if (in_array(5, $permission)) { ?> data-bs-toggle="modal"
                                     data-bs-target="#statut-<?= $facturation['RefFacture']; ?>" <?php } ?>>
                                     <?= $facturation['name_statutFacture']; ?></button>

                             <td><?= $facturation['datefacture']; ?> </td>
                             <td><?= $facturation['nomfournisseur']; ?> </td>
                             <td><?= $facturation['libele']; ?> </td>
                             <td><?= $facturation['montantttc']; ?> </td>
                             <td><?= $facturation['echeance']; ?> </td>
                             <td>
                                 <?php if (!empty($facturation['fichier'])) { ?>
                                 <a href="/documents/<?= $facturation['fichier']; ?>" class="btn btn-success"
                                     target="_blank">
                                     <i class="fas fa-file-invoice"></i>
                                 </a>
                                 <?php } ?>
                                 <?php if (!empty($facturation['RefDemande'])) { ?>
                                 <a href="/demande/display/<?= $facturation['RefDemande']; ?>" class="btn btn-primary"
                                     target="_blank">
                                     <i class="fas fa-eye"></i>
                                 </a>
                                 <?php } ?>
                             </td>
                             <?php if (in_array(6, $permission)) { ?>
                             <td>
                                 <a href="/comptabilite/updateFacturations/<?= $facturation['RefFacture']; ?>"
                                     class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                 <a href="/comptabilite/deleteFacturations/<?= $facturation['RefFacture']; ?>"
                                     class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                             </td>
                             <?php } ?>
                         </tr>
                         <!-- Modal -->
                         <div class="modal fade" id="statut-<?= $facturation['RefFacture']; ?>" tabindex="-1"
                             role="dialog" aria-labelledby="composemodalTitle" aria-hidden="true">
                             <div class="modal-dialog " role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="composemodalTitle">Changer le statut</h5>
                                         <button type="button" class="btn-close" data-bs-dismiss="modal"
                                             aria-label="Close"></button>
                                     </div>
                                     <form method="POST">
                                         <div class="modal-body">
                                             <div>
                                                 <input type="hidden" name="RefFacture"
                                                     value="<?= $facturation['RefFacture']; ?>" <select
                                                     class="form-control" name="RefStatut" required="">
                                                 <select class="form-control" name="RefStatut" required="">
                                                     <option>Choisir</option>
                                                     <?php foreach ($statut as $value) { ?>
                                                     <option value="<?= $value['RefStatut']; ?>">
                                                         <?= $value['name_statutFacture']; ?></option>
                                                     <?php } ?>
                                                 </select>
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
                         <?php } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </div>