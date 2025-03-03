<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('/views/partials/nav.php')) ?>
<?php require(base_path('/views/partials/banner.php')) ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="POST" id="update-form" action="/notes">
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">

                <a class="underline text-blue-500" href="/note?id=<?= $note['id'] ?>">Return</a>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="body" class="block text-sm/6 font-medium text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea 
                                name="body"
                                id="body" 
                                rows="3" 
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                placeholder="Here's an idea for a note..."
                            ><?= $note['body'] ?></textarea>
                        </div>
                        <?php if(isset($errors['body'])) : ?>
                            <p class="mt-3 text-sm/6 text-red-600"><?= $errors['body'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="submit" form="update-form" class="cursor-pointer rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                        <button type="submit" form="delete-form" class="cursor-pointer rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Delete</button>

                    </div>
                </div>

            </div>
        </div>
    </form>

    <form id="delete-form" method="POST" class="mt-6" action="/notes">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $note['id'] ?>">
    </form>

    </div>
</main>

<?php require(base_path('views/partials/footer.php')) ?>