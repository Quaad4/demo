<?php require(base_path('views/partials/head.php')) ?>
<?php require(base_path('/views/partials/nav.php')) ?>
<?php require(base_path('/views/partials/banner.php')) ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="underline text-blue-500">Back to all Notes</a>
        </p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <a href="/notes/edit?id=<?= $note['id'] ?>">
            <button class="mt-6 cursor-pointer rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </button>
        </a>
    </div>
</main>

<?php require(base_path('views/partials/footer.php')) ?>