<?php

namespace Anax\View;

/**
 * View to display all books.
 */
// Show all incoming variables/functions
//var_dump(get_defined_functions());
//echo showEnvironment(get_defined_vars());

// Gather incoming variables and use default values if not set
$items = isset($items) ? $items : null;

?><h1 class="center">View all books</h1>

<?php if (!$items) : ?>
    <p>There are no items to show.</p>
    <?php return;
endif;
?>

<script type="text/javascript" src='../js/pamo.js'> </script>

<table class="results-table clickable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Title</th>
            <th>Author</th>
        </tr>
    </thead>
    <?php foreach ($items as $item) : ?>
    <tr id="<?= $item->id ?>">
        <td><?= $item->id ?></td>
        <td><img src="../image/books/<?= $item->image ?>?w=100" alt="<?= $item->image ?>"></td>
        <td><?= $item->title ?></td>
        <td><?= $item->author ?></td>
    </tr>
    <script>tableLinks(<?= $item->id ?>, "<?= url("book/update/{$item->id}") ?>");</script>
    <?php endforeach; ?>
</table>
