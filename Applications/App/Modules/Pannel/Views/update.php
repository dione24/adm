<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un Utilisateur</h4></br>
                <form method="POST">
                    <input type="hidden" name="RefUsers" value="<?= $user['RefUsers']; ?>">
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Login</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="login" id="example-text-input"
                                value="<?= $user['login']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Password</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="password" id="example-text-input">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Nom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="nom" id="example-text-input"
                                value="<?= $user['nom']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Prenom</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="prenom" id="example-text-input"
                                value="<?= $user['prenom']; ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="email" id="example-text-input"
                                value="<?= $user['email']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Role</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status" id="example-text-input" required>
                                <option value="">Selectionner un role</option>
                                <option value="admin" <?php if ($user['status'] == 'admin') { ?> selected <?php } ?>>
                                    Admin</option>
                                <option value="user" <?php if ($user['status'] == 'user') { ?> selected <?php } ?>>User
                                </option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Valider</button>
                        <a href="/employe/index" class="btn btn-danger w-md">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>