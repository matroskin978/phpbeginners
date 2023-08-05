<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">

                <h3>Login page</h3>

                <form action="" method="post">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                        <?= isset($validation) ? $validation->listErrors('email') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                        <?= isset($validation) ? $validation->listErrors('password') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>