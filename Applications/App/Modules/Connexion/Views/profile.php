<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <label>Nom</label>
                    <div>
                        <input type="text" class="form-control" value="<?= $_SESSION['Nom']; ?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Prenom</label>
                    <div>
                        <input type="text" class="form-control" value="<?= $_SESSION['Prenom']; ?>" readonly>

                    </div>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <div>
                        <input type="text" class="form-control" value="<?= $_SESSION['email']; ?>" readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label>Statut</label>
                    <div>
                        <input type="text" class="form-control" value="<?= $_SESSION['statut']; ?>" readonly>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="" class="custom-validation" novalidate="">

                    <div class="mb-3">
                        <label>Ancien Mot de Passe</label>
                        <div>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Nouveau Mot de Passe</label>
                        <div>
                            <input type="password" class="form-control" name="newpassword">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Confirmation Nouveau Mot de Passe</label>
                        <div>
                            <input type="password" class="form-control" name="confirmpassword">
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <i class=" fas fa-user-lock"></i> Changer
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>



</div>