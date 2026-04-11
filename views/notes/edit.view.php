<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="/note/update" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">


            <label for="body" class="text-white block mb-2">Description</label>
            <div>
                <textarea name="body" id="body" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Write your notes..."><?= htmlspecialchars($note['body'] ?? '') ?></textarea>

                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['body'] ?></p>
                <?php endif; ?>
            </div>

            <!-- make button to cancle edit -->

            <a href="/notes" class="mt-2 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
        </form>
    </div>
    </div>
</main>



<?php require base_path("views/partials/footer.php"); ?>