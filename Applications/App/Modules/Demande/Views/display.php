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
                         <span class="btn btn-<?php if ($demande['statut_demande'] == 1) {
                                                    echo 'warning';
                                                } elseif ($demande['statut_demande'] == 2) {
                                                    echo 'primary';
                                                } elseif ($demande['statut_demande'] == 3) {
                                                    echo 'success';
                                                } elseif ($demande['statut_demande'] == 4) {
                                                    echo 'success';
                                                } elseif ($demande['statut_demande'] == 5) {
                                                    echo 'danger';
                                                }; ?>"><?= $demande['name_statut_demande']; ?></span>
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
                             <p class="text-muted mb-0"><?= date('d/m/Y', strtotime($demande['Approv3_Time'])); ?></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="col-lg-5">
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
                             <tr>
                                 <td style="width: 50px;"> <i class="fas fa-user-clock text-warning"></i>
                                     <?= date('d/m/Y H:i', strtotime($demande['Approv1_Time'])); ?>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                             class="text-dark"><?= $approbation1['nomEmploye'] . ' ' . $approbation1['prenomEmploye']; ?></a>
                                     </h5>
                                 </td>
                                 <td>
                                     <div>
                                         <a href="javascript: void(0);"
                                             class="badge bg-primary bg-soft text-primary font-size-11"><?= $approbation1['posteEmploye']; ?></a>
                                     </div>
                                 </td>
                             </tr>
                             <tr>
                                 <td style="width: 50px;"> <i class="fas fa-user-clock text-info"></i>
                                     <?= date('d/m/Y H:i', strtotime($demande['Approv2_Time'])); ?>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                             class="text-dark"><?= $approbation2['nomEmploye'] . ' ' . $approbation2['prenomEmploye']; ?></a>
                                     </h5>
                                 </td>
                                 <td>
                                     <div>
                                         <a href="javascript: void(0);"
                                             class="badge bg-primary bg-soft text-primary font-size-11"><?= $approbation2['posteEmploye']; ?></a>
                                     </div>
                                 </td>
                             </tr>

                             <tr>
                                 <td style="width: 50px;"> <i class="fas fa-user-clock text-success"></i>
                                     <?= date('d/m/Y H:i', strtotime($demande['Approv3_Time'])); ?>
                                 </td>
                                 <td>
                                     <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                             class="text-dark"><?= $approbation3['nomEmploye'] . ' ' . $approbation3['prenomEmploye']; ?></a>
                                     </h5>
                                 </td>
                                 <td>
                                     <div>
                                         <a href="javascript: void(0);"
                                             class="badge bg-primary bg-soft text-primary font-size-11"><?= $approbation3['posteEmploye']; ?></a>
                                     </div>
                                 </td>
                             </tr>

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

     <div class="col-lg-4">
         <div class="card">
             <div class="card-body">
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


     <div class="col-lg-4">
         <div class="card">
             <div class="card-body">
                 <h4 class="card-title mb-4">Add</h4>
                 <form method="POST" action="/demande/addObservation">
                     <div class="d-flex mb-4">
                         <div class="flex-shrink-0 me-3">
                         </div>
                         <div class="flex-grow-1">
                             <textarea class="form-control" name="observation"></textarea>
                         </div>
                         <input type="hidden" name="RefDemande" value="<?= $demande['RefDemande']; ?>">

                     </div>
                     <button type="submit" class="btn btn-success"><i class="fab fa-telegram-plane ms-1"></i></button>

                 </form>

             </div>
         </div>
     </div>
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