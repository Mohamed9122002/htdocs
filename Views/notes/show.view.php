<?php require base_path('Views//partials/head.php')?>
<?php require base_path('Views//partials/nav.php')?>
<?php require base_path('Views//partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?= $note['body'] ?? "" ?>
    </div>
</main>
<?php require base_path('Views//partials/footer.php')?>