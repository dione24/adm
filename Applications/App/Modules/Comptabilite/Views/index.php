 <div class="row">
     <div class="col-lg-12">

         <div class="">
             <div class="table-responsive">
                 <a href="/comptabilite/nouveau" class="btn btn-primary"><i class="fas fa-plus-circle">
                     </i> Nouveau</a><br><br>

                 <table id="dataTable" class="table project-list-table table-nowrap align-middle table-borderless">
                     <thead>
                         <tr>
                             <th class="align-middle">Date</th>
                             <th class="align-middle">Nom</th>
                             <th class="align-middle">Motif</th>
                             <th class="align-middle">Montant</th>
                             <th class="align-middle">Afficher</th>
                             <th class="align-middle">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($getDecaissement as $key => $decaissement) { ?>
                         <tr>
                             <td><?= $decaissement['datedecaissement']; ?></td>
                             <td><?= $decaissement['nomcomplet'];  ?>
                             </td>

                             <td><?= $decaissement['motifdecaissement']; ?></td>
                             <td><?= $decaissement['montantdecaissement']; ?></td>
                             </td>
                             <td>
                                 <?php if (!empty($decaissement['RefDemande'])) { ?>
                                 <a href="/demande/display/<?= $decaissement['RefDemande']; ?>" class="btn btn-primary"
                                     target="_blank">
                                     <i class="bx bx-link-external"> Demande</i>
                                 </a>
                                 <?php } ?>

                             </td>
                             <td class="td-actions">
                                 <a href="/comptabilite/print/<?= $decaissement['RefDecaissement']; ?>" target="_blank"
                                     class="btn btn-success waves-effect waves-light"><i class="fa fa-print"> </i></a>
                                 <?php if (in_array(4, $permission)) { ?>
                                 <a href="/comptabilite/update/<?= $decaissement['RefDecaissement']; ?>"
                                     class="btn btn-warning waves-effect waves-light"><i class="fa fa-edit"> </i></a>
                                 <a href="/comptabilite/delete/<?= $decaissement['RefDecaissement'];  ?>"
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