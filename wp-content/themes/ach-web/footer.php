<button id="scroll-top" onclick="window.scrollTo(0,0)" class="fs-20 m-3 m-md-4">
    <i class="ri-arrow-up-line"></i>
</button>

</div>

</main>

<footer class="bg-dark text-white mt-auto">
    <div class="container py-4">
        <div class="row align-items-end pb-5 mb-5 border-bottom" style="border-bottom-color: #6e6e6e!important;">
            <div class="col-12 col-md-6 mb-5 mb-lg-0 text-center text-md-start">
                <h5 class="fw-bold uppercase"> Xin chào đằng ấy!</h5>
                <p class="pb-3 mb-3 opacity-80">
                    Cảm ơn bạn đã ghé thăm website , <br>
                    Chúc bạn có những phút giây thư giãn nhé, <br> vì có rất nhiều thứ làm ta mệt mỏi.
                </p>
                <a href="<?= home_url(); ?>" class="footer-logo mb-2 fw-bold uppercase text-white fs-24 anchor-0">
                    <?php if (has_custom_logo()): ?>
                        <img src="<?= ViewHelper::img('hoidapgaming-logo2.png') ?>" alt="" style="height:70px">
                    <?php else: 
                        bloginfo( 'name' );
                    endif; ?>
                </a>
                <p class="opacity-80 mb-0 text-center text-md-start"><?= get_bloginfo('description'); ?></p>
            </div>
            <div class="col-12 col-md-6 d-flex flex-column">
                <form action="<?= site_url() ?>" method="GET" class="search-form mb-3 ms-auto me-auto me-md-0">
                    <div class="input-group">
                        <span class="input-group-text border-0 text-white fw-bold" style="background-color:#333539"><i class="ri-search-line"></i></span>
                        <input name="s" type="text" class="border-0 corner-5 px-10 py-6 text-white" style="background-color:#333539" placeholder="Bạn đang tìm gì..."
                            value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>">
                    </div>
                </form>
                <nav class="navbar-nav d-flex justify-content-center ms-md-auto">
                    <ul class="ul-0 d-flex flex-row flex-wrap justify-content-between justify-content-md-start">
                        <?php
                        $menu = wp_get_nav_menu_items('Primary Menu');
                        $requestUrl = ViewHelper::getRequestUrl();
                        foreach ($menu as $item) {
                            $active = str_contains($item->url, $requestUrl) ? 'active' : '';
                            echo '<li class="nav-item">';
                            echo "<a class=\"nav-link fs-14 p-0 text-white opacity-70 uppercase ms-24-md mb-10 $active\" href=\"$item->url\">$item->title</a>";
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="opacity-70 text-center fw-300">© <?= date('Y') . ' ' . get_bloginfo('title') ?> <br>
                    Tất cả các nội dung khác & nhãn hiệu thuộc sỡ hữu của các chủ thương hiệu. <br>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>