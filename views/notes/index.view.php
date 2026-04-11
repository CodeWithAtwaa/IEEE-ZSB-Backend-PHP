<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>

<style>
    li {
        list-style: none;
    }
</style>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">
        <ul>
            <?php
            foreach ($notes as $note) {
            ?>
                <li><a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline"><?= htmlspecialchars($note['body']) ?></a></li>
            <?php
            }
            ?>
        </ul>

        <p class="mt-5">
            <a href="/note/create" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create note</a>
        </p>
    </div>
</main>



<?php require base_path("views/partials/footer.php"); ?>