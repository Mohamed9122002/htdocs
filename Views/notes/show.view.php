<?php require base_path('Views//partials/head.php')?>
<?php require base_path('Views//partials/nav.php')?>
<?php require base_path('Views//partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?= $note['body'] ?? "" ?>
        <form class="mt-5" method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="text-sm text-red-500" >
                Delete Note
            </button>
        </form>
    </div>
</main>
<?php require base_path('Views//partials/footer.php')?>