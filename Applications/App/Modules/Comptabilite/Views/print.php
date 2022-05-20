   <div class="row">
       <div class="col-lg-12">
           <div class="card">
               <div class="card-body">
                   <div class="invoice-title">
                       <div class="text-center">

                           <div>
                               <img src="/images/mlc.png" alt="logo" height="50" />
                               <p class="text-left"> Société Anonyme au capital de 500 000 000 FFCFA NIF:
                                   087800619A-INPS :
                                   83236177/1</p>
                               <p class="text-left">
                                   RC:6265-BP: E3833 RUE:309-PORTE:369-Hamdallaye-ACI 2000 Bamako-Mali</p>

                               <p class="text-left"> Tel : +223 20 29 79 60 / 20 29 79 66 / 20 29 79 69 – Fax : +233
                                   20 29
                                   79 59</p>

                           </div><br>
                           <p class="text-end"><strong>Bamako,LE
                                   <?= date('d/m/Y', strtotime($getDecaissement['datedecaissement'])); ?></p></strong>
                           <br><br> <br><br>
                       </div>
                       <hr>
                       <div class="row">

                           <h5 class="text-center"><strong><u>FICHE DE DECAISSEMENT N°
                                       <?= $getDecaissement['RefDecaissement']; ?></u>
                               </strong></h5>
                       </div>
                       <div class="py-2 mt-3">
                           <h3 class="font-size-15 fw-bold"></h3>
                       </div>
                       <div class="table-responsive">
                           <table class="table  table-borderless ">
                               <thead>
                                   <tr>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td><strong><u>NOM & PRENOM : </u>
                                               <?= $getDecaissement['nomcomplet']; ?></strong>
                                       </td>

                                   </tr>
                                   <tr>
                                       <td><strong><u>MOTIF:</u> <?= $getDecaissement['motifdecaissement']; ?></strong>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td><strong><u>MONTANT:
                                               </u><?= $getDecaissement['montantdecaissement']; ?> CFA</strong>
                                       </td>
                                   </tr>
                               </tbody>
                           </table>
                           <br>
                           <table class="table  table-borderless ">
                               <thead>
                                   <tr>
                                       <th></th>
                                       <th></th>
                                       <th></th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td><u>VISA Bénéficiare</u></td>
                                       <td><u>VISA Caissière</u></td>
                                       <td class="text-end"><u>VISA Comptable</u></td>
                                   </tr>
                               </tbody>
                           </table>
                       </div>

                   </div>
               </div>
           </div>
           <br><br>

           <hr>
           <div class="card text-center">
               <div class="card-body">
                   <div class="invoice-title">
                       <div class="card">
                           <div class="">
                               <img src="/images/mlc.png" alt="logo" height="50" />
                               <p class="text-left"> Société Anonyme au capital de 500 000 000 FFCFA NIF:
                                   087800619A-INPS :
                                   83236177/1</p>
                               <p class="text-left">
                                   RC:6265-BP: E3833 RUE:309-PORTE:369-Hamdallaye-ACI 2000 Bamako-Mali</p>

                               <p class="text-left"> Tel : +223 20 29 79 60 / 20 29 79 66 / 20 29 79 69 – Fax : +233
                                   20 29
                                   79 59</p>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>