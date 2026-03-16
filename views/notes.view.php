<?php include('partials/head.php') ?>
<?php include("partials/nav.php") ?>

<?php include('partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <ul>
            <?php
            foreach ($notes as $note) {
            ?>
                <li class="mb-2">
                    <a
                        href="/note?id=<?= htmlspecialchars($note['id']) ?>"
                        class="block px-3 py-2  text-blue-600 rounded hover:bg-blue-50 hover:text-blue-800 transition">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>

        <p class="mt-5">
            <a href="/notes/create" class="inline-block px-3 py-3  text-white bg-green-500 rounded hover:bg-blue-600 transition">Create Note</a>
        </p>
    </div>
</main>


<?php include('partials/footer.php') ?>