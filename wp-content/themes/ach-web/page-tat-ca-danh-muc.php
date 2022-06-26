<?php get_header(); ?>

<?php
    $tags = get_tags();
    $tmp = ['#',  
        'A', 'B', 'C', 'D', 'E', 'F', 'G' , 'H' , 'I' , 'J' , 'K' , 'L' , 'M' , 'N' , 'O' , 'P' , 'Q' , 'R' , 'S' , 'T' , 'V' , 'W' , 'X' , 'Y' , 'Z'
    ];
    $quickJumps = [];

    foreach($tmp as $t) {
        $quickJumps[$t] = [];
    }
    foreach($tags as $t) {
        $tagName = $t->name;
        $firstLetter = strtoupper(ViewHelper::tiengVietKhongDau($tagName[0]));
        $key = is_numeric($firstLetter) ? '#' : $firstLetter;

        $quickJumps[$key][] = [
            'name' => $tagName,
            'url' => get_term_link($t->term_id),
        ];
    }
?>

<div class="row mb-5">
    <div class="col-12 text-center mb-3 uppercase"><span><b>MỤC LỤC:</b></span></div>
    <div id="quickJumps" class="mx-auto d-flex justify-content-center flex-wrap">
        <?php 
            foreach ($quickJumps as $key => $items) {
                echo '<a href="#'.$key.'">'.$key.'</a>';
            }
        ?>
    </div>
</div>

<?php 
    foreach ($quickJumps as $key => $items) {
        if (count($items) == 0) {
            continue;
        }
        echo '<h1 id="'.$key.'" style="font-weight:700">'. $key .'</h1>';
        echo '<div class="mt-3 mb-60 row">';
        foreach($items as $itm) {
            echo '<div class="col-4 col-md-3 mb-3">';
            echo '  <a href="'.$itm['url'].'" class="anchor-0 text-dark px-2 py-1" style="color: #4873a9; border-bottom:2px solid #cae6fc;">'.$itm['name'].'</a>';
            echo '</div>';
        }
        echo '</div>';
    }
?>

<?php get_footer(); ?>


    
