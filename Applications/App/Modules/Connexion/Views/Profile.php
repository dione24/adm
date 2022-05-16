      <div class="row">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="card-title">
                                        <div class="title">Mon Profil</div>
                                    </div>
                                </div>
                                <div class="panel-body ">
                                       <div class="form-group col-xs-12">
                                          <p> <i class="fa fa-user">
                                            </i> <?= $_SESSION['Nom']." ".$_SESSION['Prenom'];?> </p> 
                                       </div>
                                       <div class="form-group col-md-5"><button class="btn btn-success bt-small" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i> Mot de Passe </button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!---modal First Password-->

                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        	<form method="post" action="/CheckPassword"> 
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Veuillez entre votre Mot de Passe actuel</h4>
                                </div>
                                <div class="modal-body">
                                   <input type="Password" class="form-control" name="password">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Continuer</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>