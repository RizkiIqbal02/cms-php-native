<?php include __DIR__ . "/../partials/layouts/header.php" ?>

<?php include __DIR__ . "/../partials/components/navbar.php" ?>

<?php include __DIR__ . "/../partials/components/breadcrumbs.php" ?>

<div class="flex gap-5 mt-10 justify-center">
    <?php foreach ($posts as $post) : ?>
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">
                    <?= $post['title'] ?>
                    <div class="badge badge-secondary"><?= substr($post['created_at'], 0, 10) ?></div>
                </h2>
                <p><?= $post['description'] ?></p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline">Fashion</div>
                    <div class="badge badge-outline">Products</div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php include __DIR__ . "/../partials/layouts/footer.php" ?>