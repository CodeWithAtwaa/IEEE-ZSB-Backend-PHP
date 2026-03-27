<?php include base_path('views/partials/head.php') ?>
<?php include base_path("views/partials/nav.php") ?>
<?php include base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- Back Button -->
        <a href="/notes"
            class="inline-flex items-center gap-2 text-sm font-medium text-blue-600 hover:text-blue-800 transition">
            ← Go Back
        </a>

        <!-- Note Card -->
        <div class="mt-6 bg-white shadow-md rounded-lg border border-gray-200 p-6">

            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                Note Details
            </h2>

            <p class="text-gray-700 leading-relaxed text-base">
                <?= htmlspecialchars($note['body']) ?>
            </p>

            <!-- Action Buttons -->
            <div class="mt-6 flex items-center gap-4">

                <a href="/note/edit?id=<?= $note['id'] ?>"
                    class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-orange-500 rounded-md hover:bg-orange-600 transition">
                    ✏ Edit
                </a>

                <form method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $note['id']; ?>">

                    <button
                        class="inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-red-500 rounded-md hover:bg-red-600 transition">
                        🗑 Delete
                    </button>
                </form>

            </div>

        </div>

    </div>
</main>

<?php include base_path('views/partials/footer.php') ?>