
<?php
    $items = $args['items'];
    for($i = 0, $total = count($items); $i < $total; ++$i) {
        echo '<a href="'.get_term_link($items[$i]->term_id).'" class="text-dark tag">'. htmlentities($items[$i]->name) .'</a>';
        if ($i < $total - 1) {
            echo '<span class="mx-1"> , </span>';
        }
    }