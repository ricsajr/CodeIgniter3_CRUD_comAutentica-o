<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>País</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?= $user['id']?></td>
                        <td><?= $user['name']?></td>
                        <td><?= $user['email']?></td>
                        <td><?= $user['country']?></td>
                        <td>
                            <a href="<?= base_url().'users/edit/'.$user['id']?>" class="btn btn-primary btn-sm btn-warning">
                                <i class="fas fa-pencil-alt" ></i>
                            </a>
                            <a href="javascript:goDelete(<?= $user['id']?>)" class="btn btn-primary btn-sm btn-danger">
                                <i class="fas fa-trash-alt" ></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>





