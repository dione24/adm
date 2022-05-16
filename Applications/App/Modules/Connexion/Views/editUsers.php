      <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Mofication des informations de l'utilisateur</div>
                                    </div>
                                </div>
                                <div class="panel-body ">
                                    <form  method="post" action="/updateUsers">
                                      <input type="hidden" class="form-control col-md-3" name="id" value="<?= $usesinfo['id'];?>">
                                        <div class="form-group col-md-5">
                                            <label for="Nom">Nom</label>
                                            <input type="text" class="form-control col-md-3" name="Nom" value="<?= $usesinfo['Nom'];?>">
                                        </div>
                                         <div class="form-group col-md-5">
                                            <label for="Prenom">Prenom</label>
                                            <input type="text" class="form-control col-md-3" name="Prenom" value="<?= $usesinfo['Prenom'];?>">
                                        </div>

                                         <div class="form-group col-md-5">
                                            <label for="Prenom">Email</label>
                                            <input type="text" class="form-control col-md-3" name="email" value="<?= $usesinfo['email'];?>">
                                        </div>
                                          <div class="form-group col-md-5">
                                            <label for="Prenom">Login</label>
                                            <input type="text" class="form-control col-md-3" name="login" value="<?= $usesinfo['login'];?>">
                                        </div>

                                          <div class="form-group col-md-5">
                                        <label for="Statut">Statut</label>
                                        <select class="form-control" name="id_statut">
                                            <?php foreach ($Statut as $key => $value) { ?>
                                                <option value="<?= $value['id_statut'];?>" <?php if($usesinfo['id_statut'] == $value['id_statut']){?> selected="" <?php } ?> ><?= $value['name_statut'];?> </option>
                                          <?php   } ?>
                                         </select>
                                     </div>
                                    <div class="form-group col-md-5">
                                            <label for="Password">Password</label>
                                            <input type="password" class="form-control col-md-3" name="password">
                                        </div>
                                        
                                      <div class="form-group col-md-5"><button type="submit" class="btn btn-success">Valider</button></div>
                                             
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>