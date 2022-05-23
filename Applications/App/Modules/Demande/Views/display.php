 <div class="row">
     <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
             <h4 class="mb-sm-0 font-size-18">Details </h4>

             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="/demande/index">Demandes</a></li>
                     <li class="breadcrumb-item active">Details </li>
                 </ol>
             </div>

         </div>
     </div>
 </div>
 <!-- end page title -->

 <div class="row">
     <div class="col-lg-7">
         <div class="card">
             <div class="card-body">
                 <div class="d-flex">
                     <div class="flex-shrink-0 me-4">
                         <span
                             class="btn btn-<?= $getStatutDemande['color']; ?>"><?= $getStatutDemande['name_statut_demande']; ?></span>
                     </div>

                     <div class=" flex-grow-1 overflow-hidden">
                         <h5 class="text-truncate font-size-15"><?= $demande['name_demande']; ?></h5>
                         <p class="text-muted"><?= $demande['libele']; ?></p>
                     </div>
                 </div>

                 <h5 class="font-size-15 mt-4">Note</h5>

                 <p class="text-muted"><?= $demande['note']; ?></p>


                 <div class="row task-dates">
                     <div class="col-sm-4 col-6">
                         <div class="mt-4">
                             <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                             <p class="text-muted mb-0"><?= $demande['date_demande']; ?></p>
                         </div>
                     </div>

                     <div class="col-sm-4 col-6">
                         <div class="mt-4">
                             <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date
                             </h5>
                             <p class="text-muted mb-0">
                                 <? //= date('d/m/Y', strtotime($demande['Approv3_Time'])); 
                                    ?>
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-lg-5">
         <?php if ($demande['RefTypeDemande'] == 5 && ($demande['payement'] != 1)) { ?>
         <div class="card">
             <div class="card-body">
                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newfiche">
                     <i class="fas fa-sign-out-alt"> FICHE DE SORTIE</i></button>
             </div>
         </div>
         <?php } ?>
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title mb-4">Suivi </h4>

                 <div class="table-responsive">
                     <table class="table align-middle table-nowrap">
                         <tbody>
                             <tr>
                                 <td> <i class="fas fa-user-clock text-secondary"></i>
                                     <?= date('d/m/Y H:i', strtotime($demande['date_demande'])); ?>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                             class="text-dark"><?= $infoDemandeur['nomEmploye'] . ' ' . $infoDemandeur['prenomEmploye']; ?></a>
                                     </h5>
                                 </td>
                                 <td>
                                     <div>
                                         <a href="javascript: void(0);"
                                             class="badge bg-primary bg-soft text-primary font-size-11"><?= $infoDemandeur['posteEmploye']; ?></a>
                                     </div>
                                 </td>
                             </tr>
                             <?php foreach ($informationLog as $infoLog) { ?>
                             <tr>
                                 <td style="width: 50px;"> <i
                                         class="fas fa-user-clock text-<?= $infoLog['color']; ?>"></i>
                                     <?= date('d/m/Y H:i', strtotime($infoLog['log_time'])); ?>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">
                                             <?= $infoLog['nomEmploye'] . ' ' . $infoLog['prenomEmploye'];  ?>
                                         </a>
                                     </h5>
                                 </td>
                                 <td>
                                     <div>
                                         <a href="javascript: void(0);"
                                             class="badge bg-primary bg-soft text-primary font-size-11"><?= $infoLog['posteEmploye']; ?></a>
                                     </div>
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
 </div>
 <!-- end row -->
 <div class="row">
     <div class="col-lg-4">
         <div class="card">
             <div class="card-body">

                 <h4 class="card-title mb-4">Fichiers joints <a class="text-muted" data-bs-toggle="modal"
                         data-bs-target="#newfile"> <i class="bx bx-plus-circle fo"></i></a>
                 </h4>
                 <div class="table-responsive">
                     <table class="table table-nowrap align-middle table-hover mb-0">
                         <tbody>
                             <?php if (isset($demande['file'])) { ?>
                             <tr>
                                 <td style="width: 45px;">
                                     <div class="avatar-sm">
                                         <span
                                             class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                             <i class="bx bxs-file-doc"></i>
                                         </span>
                                     </div>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 mb-1"><a href="/documents/<?= $demande['file']; ?>"
                                             target="_blank" class="text-dark"><?= $demande['file']; ?></a></h5>
                                 </td>
                                 <td>
                                     <div class="text-center">
                                         <a href="/documents/<?= $demande['file']; ?>" class=" text-dark"><i
                                                 class="bx bx-download h3 m-0"></i></a>
                                     </div>
                                 </td>
                             </tr>
                             <?php } ?>
                             <?php foreach ($documents as $key => $document) { ?>
                             <tr>
                                 <td style="width: 45px;">
                                     <div class="avatar-sm">
                                         <span
                                             class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-24">
                                             <i class="bx bxs-file-doc"></i>
                                         </span>
                                     </div>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 mb-1"><a
                                             href="/documents/<?= $document['name_documents']; ?>" target="_blank"
                                             class="text-dark"><?= $document['name_documents']; ?></a></h5>
                                 </td>
                                 <td>
                                     <div class="text-center">
                                         <a href="/documents/<?= $document['name_documents']; ?>" class=" text-dark"><i
                                                 class="bx bx-download h3 m-0"></i></a>
                                     </div>
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

     <div class="col-lg-3">
         <div class="card">
             <div class="card-body">
                 <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newObservation">
                     <i class=" fas fa-comment"></i></button>

                 <h4 class="card-title mb-4">Commentaires</h4>
                 <?php foreach ($commentaires as $key => $comment) { ?>
                 <div class="d-flex mb-4">
                     <div class="flex-shrink-0 me-3">
                         <img class="d-flex-object rounded-circle avatar-xs" alt="" src="/images/mlc.ico">
                     </div>
                     <div class="flex-grow-1">
                         <h5 class="font-size-13 mb-1"><?= $comment['nomEmploye'] . ' ' . $comment['prenomEmploye']; ?>
                         </h5>
                         <p class="text-muted mb-1">
                             <?= $comment['observation']; ?>
                         </p>
                     </div>
                 </div>
                 <?php } ?>
             </div>
         </div>
     </div>

     <?php if (!empty($contentDemande)) { ?>
     <div class="col-lg-12">
         <div class="card">
             <a href="javascript:void(0);" id="printBtn" class="btn btn-primary waves-effect waves-light"
                 style="position: absolute;right: 0px;margin-top: 13px;margin-right: 0 px;"><i
                     class="fas fa-print"></i></a>
             <div class="card-body">
                 <?php if (empty($demande['payement'])) { ?>
                 <a href="/demande/deletefiche/<?= $demande['RefDemande'];  ?>"
                     class="btn btn-danger waves-effect waves-light"
                     onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                         class="fa fa-trash-alt">
                     </i></a>
                 <?php } ?>

                 <div id="printableArea">

                     <p>REF : <?= $demande['uniqid']; ?></p>
                     <p class="card-title">
                         Date : <?= date('d/m/Y', strtotime($demande['date_demande'])); ?>
                     </p>
                     <p>
                         Demadeur : <?= $infoDemandeur['nomEmploye'] . ' ' . $infoDemandeur['prenomEmploye']; ?>
                     </p>
                     <h4 class="text-center font-weight-bold">
                         FICHE DE SORTIE</h4>
                     <p class="card-title-desc" <div class="table-responsive">
                     <table class="table table-bordered border-primary mb-0">
                         <thead>
                             <tr>
                                 <th>ENTITE/CLIENT</th>
                                 <th>MOTIF</th>
                                 <th>LIEU/LOCALITE</th>
                                 <th>COMMENTAIRE</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php foreach ($contentDemande as $key => $demande) { ?>
                             <tr>
                                 <td><?= $demande['client']; ?></td>
                                 <td><?= $demande['divers']; ?></td>
                                 <td><?= $demande['adresse']; ?></td>
                                 <td><?= $demande['commentaire']; ?></td>
                             </tr>
                             <?php } ?>
                         </tbody>
                         <tfoot>

                             <tr>
                                 <td colspan="5">
                                     Visa :
                                 </td>
                             </tr>
                         </tfoot>
                     </table>
                 </div>
             </div>

         </div>
     </div>
 </div>
 <?php } ?>
 <!-- end col -->
 </div>
 <!-- Modal -->
 <div class="modal fade" id="newfile" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
     aria-hidden="true">
     <div class="modal-dialog " role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="composemodalTitle">Add New File</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="/demande/uploadfile" enctype="multipart/form-data">
                 <div class="modal-body">
                     <div>
                         <input type="file" name="name_documents" class="form-control">
                     </div>
                     <input type="hidden" value="<?= $demande['RefDemande']; ?>" name="RefDemande">
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
 <!-- Modal Comment -->
 <div class="modal fade" id="newObservation" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
     aria-hidden="true">
     <div class="modal-dialog " role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="composemodalTitle"> Nouveau Commentaire</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="/demande/addObservation">
                 <div class="modal-body">
                     <div class="flex-shrink-0 me-3">
                     </div>
                     <div class="flex-grow-1">
                         <textarea class="form-control" name="observation"></textarea>
                     </div>
                     <input type="hidden" name="RefDemande" value="<?= $demande['RefDemande']; ?>">

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
 <!--end modalComment-->
 <!-- Modal Fiche de Sortie -->
 <div class="modal fade" id="newfiche" tabindex="-1" role="dialog" aria-labelledby="composemodalTitle"
     aria-hidden="true">
     <div class="modal-dialog " role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="composemodalTitle">Ajouter un Element</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <form method="POST" action="/demande/addFiche">
                 <div class="modal-body">
                     <div>
                         <label class="typecourrier">
                             ENTITE/CLIENT</label>
                         <input class="form-control" name="client">
                     </div>

                     <div>
                         <label class="typecourrier">MOTIF</label>
                         <input class="form-control" name="motif">
                     </div>
                     <div>
                         <label class="typecourrier">LIEU/LOCALITE</label>
                         <input class="form-control" name="adresse">
                     </div>
                     <input type="hidden" name="RefDemande" value="<?= $demande['RefDemande']; ?>">
                     <div>
                         <label for="message-text" class="col-form-label">COMMENTAIRE</label>
                         <textarea name="commentaire" class="form-control" rows="3" required></textarea>

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
 <!--end modalFIche-->