<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste Type Courrier</h4>


                <div class="table-responsive">
                    <button class="btn btn-success"><i class="fas fa-plus"></i></button></br></br>
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>ShortName</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($typecourrier as $type) { ?>
                            <tr>
                                <td scope="row"><?= $type['RefType']; ?></td>
                                <td scope="row"><?= $type['name_type']; ?></td>
                                <td scope="row"><?= $type['shortName']; ?></td>
                                <td scope="row">
                                    <a href="/pannel/configurations/type/edit/<?= $type['RefType']; ?>"
                                        class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="/pannel/configurations/type/delete/<?= $type['RefType']; ?>"
                                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
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

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Horizontal Form Layout</h4>

                <form>
                    <div class="row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="horizontal-firstname-input"
                                placeholder="Enter Your ">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="horizontal-email-input"
                                placeholder="Enter Your Email ID">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="horizontal-password-input"
                                placeholder="Enter Your Password">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-9">

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="horizontalLayout-Check">
                                <label class="form-check-label" for="horizontalLayout-Check">
                                    Remember me
                                </label>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>