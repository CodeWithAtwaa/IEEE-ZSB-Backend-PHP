<?php include base_path('views/partials/head.php') ?>
<?php include base_path("views/partials/nav.php") ?>
<?php include base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form method="POST" action="/note">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            
            <div class="space-y-12">
                <div class="border-b border-gray-900/10 pb-12">

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                        <div class="col-span-full">
                            <label for="about" class="block text-sm/6 font-medium text-gray-900 mt-3">Body</label>
                            <div class="mt-2">
                                <textarea
                                    id="about"
                                    name="body"
                                    rows="3"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"><?= htmlspecialchars($note['body']) ?></textarea>

                                <?php if (isset($error['body'])): ?>
                                    <p class="text-white bg-red-500 mt-3 text-xs text-center py-2 rounded">
                                        <?= htmlspecialchars($error['body']) ?>
                                    </p>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-start gap-x-6">
                <input
                    type="submit"
                    value="Update"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                <a
                    href="/notes"
                    class="text-sm font-semibold text-gray-900 hover:text-gray-700">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</main>


<?php include base_path('views/partials/footer.php') ?>