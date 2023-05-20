<?php
require VIEWS . '/incs/header.php';

/**
 * @var \myfrm\Validator $validation
 */
?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>New post</h1>

                <form action="/posts" method="post">

                    <div class="mb-3">
                        <label for="title" class="form-label">Post title</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Post title" value='<?= old('title') ?>'>
                        <?= isset($validation) ? $validation->listErrors('title') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea name="excerpt" class="form-control" id="excerpt" rows="2" placeholder="Post exceprt"><?= old('excerpt') ?></textarea>
                        <?= isset($validation) ? $validation->listErrors('excerpt') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea name="content" class="form-control" id="content" rows="5" placeholder="Post content"><?= old('content') ?></textarea>
                        <?= isset($validation) ? $validation->listErrors('content') : ''  ?>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>