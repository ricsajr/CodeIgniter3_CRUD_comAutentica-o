<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    <div class="col-md-12">
        <?php if(isset($id)) : ?>
            <form action="<?= base_url().'users/update/'.$id ?>" method="post">
        <?php else : ?>
            <form action="<?= base_url().'users/store/'?>" method="post">
        <?php endif; ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?= isset($name) ? $name : ''?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" id="email" rows="5" class="form-control" placeholder="Email" value="<?= isset($email) ? $email : ''?>"/>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">País</label>
                    <input type="text" class="form-control" name="country" id="country" placeholder="País" value="<?= isset($country) ? $country : ''?>">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success btn-xs"><i class="fas fa-check"></i> Save</button>
                <a href="" class="btn btn-danger btn-xs"><i class="fas fa-times"></i> Cancel</a>
            </div>
    </div>
    </form>
    </div>

</main>
</div>
</div>



