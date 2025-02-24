<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/demo/notes" class="underline text-blue-500">Back to all Notes</a>
        </p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
    </div>
</main>

<?php require('partials/footer.php') ?>