<?php require base_path('Views//partials/head.php')?>
<?php require base_path('Views//partials/nav.php')?>
<?php require base_path('Views//partials/banner.php')?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p><?= htmlspecialchars($note['body'])?></p>
        <br/>
   <a href="/note/edit?id=<?= $note['id'] ?>" class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>        <form class="mt-5" method="POST" action="/note">
            <input type="hidden" name="_method" value="DELETE">
           <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                Delete Note
        </form>
    </div>
</main>
<?php require base_path('Views//partials/footer.php')?>