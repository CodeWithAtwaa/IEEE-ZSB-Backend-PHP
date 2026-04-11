<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>
<?php require base_path("views/partials/banner.php"); ?>


<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <form action="/notes" method="POST" enctype="multipart/form-data">
            <label for="body" class="text-white block mb-2">Description</label>
            <div>
               <textarea name="body" id="body" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Write your notes..."><?= htmlspecialchars($_POST['body'] ?? '') ?></textarea>

                <?php if (isset($errors['body'])) : ?>
                    <p class="text-red-500 text-sm mt-1"><?= $errors['body'] ?></p>
                <?php endif; ?>

                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Create Note</button>
        </form>
    </div>
    </div>
</main>



<?php require base_path("views/partials/footer.php"); ?>