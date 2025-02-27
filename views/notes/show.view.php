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

        <form method="POST" class="mt-6">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="text-sm text-red-500 font-bold">Delete</button>
        </form>
    </div>
</main>

<?php require(base_path('views/partials/footer.php')) ?>