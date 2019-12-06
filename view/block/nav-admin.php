<?php

namespace Anax\View;

?>

<div class="pageNav">
    <?php foreach ($navLinks as $link) { ?>
        <a href="<?= url($baseUrl . $link["url"]) ?>"><?= ucfirst($link["url"]) ?></a>
    <?php } ?>
</div>
