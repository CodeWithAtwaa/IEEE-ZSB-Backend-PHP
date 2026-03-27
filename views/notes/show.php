<?php include base_path('views/partials/head.php') ?>
<?php include base_path("views/partials/nav.php") ?>
<?php include base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <p class="mt-6">
            <a href="/notes"
                class="inline-block px-3 py-1 text-xs font-medium text-white bg-blue-500 rounded hover:bg-blue-600 transition">
                ← Go Back
            </a>
        </p>
        <p class="text-blue-600 my-6"> <?= $note['body'] ?></p>

        <form method="POST" class="my-6">
            <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
            <button class="inline-block px-3 py-1 text-xs font-medium text-red-200 bg-red-500 rounded hover:bg-red-600 transition">Delete</button>
        </form>


    </div>
</main>


<?php include base_path('views/partials/footer.php') ?>