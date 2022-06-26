<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_bloginfo('title') ?></title>
    
    <?php wp_head(); ?>
</head>

<body class="d-flex flex-column" style="min-height: 100vh;">
    <header id="page-header" class="navbar bg-dark d-flex align-items-center position-relative">
        <!-- Navigation Bar -->
        <nav class="container flex-wrap flex-md-nowrap" aria-label="Main navigation">
            <a class="navbar-brand p-0 me-24 fs-18 fw-bold uppercase text-white" href="<?= home_url(); ?>" aria-label="Bootstrap">
                <?php if (has_custom_logo()): ?>
                    <img src="<?= ViewHelper::img('hoidapgaming-logo2.png') ?>" alt="" style="height:70px">
                <?php else: 
                    bloginfo( 'name' );
                endif; ?>
            </a>

            <div class="d-none d-md-flex justify-content-center mx-auto">
                <ul class="navbar-nav flex-row pt-2 py-md-0">
                    <?php
                    $menu = wp_get_nav_menu_items('Primary Menu');
                    $requestUrl = ViewHelper::getRequestUrl();
                    foreach ($menu as $item) {
                        $active = str_contains($requestUrl, $item->url) ? 'active' : '';
                        echo '<li class="nav-item col-6 col-md-auto">';
                        echo "<a class=\"nav-link fs-14 me-24 $active\" href=\"$item->url\">$item->title</a>";
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>

            <button id="page-search-toggle" class="btn p-0 text-white fw-bold fs-24 ms-auto">
                <i class="ri-search-line"></i>
            </button>
            <button id="mobile-nav-toggle" class="d-md-none btn p-0 text-white fw-bold fs-24 ms-3" data-bs-toggle="offcanvas" data-bs-target="#mobile-menu">
                <i class="ri-menu-5-line"></i>
            </button>
        </nav>

        <!-- Page Search Dropdown -->
        <div id="page-search" class="bg-dark d-flex justify-content-center position-absolute top-100 left-0 w-100">
            <form action="<?= site_url() ?>" method="GET" class="search-form">
                <div id="search-input" class="" style="border-bottom: 2px solid var(--color-h2l2);">
                    <input type="text" name="s" class="text-white" placeholder="Bạn đang tìm gì..."
                        value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>">
                    <button class="btn p-0 fs-32 fw-bold text-white">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" style="width: 70vw;max-width:500px;">
            <div class="offcanvas-header d-flex">
                <button type="button" class="btn ms-auto p-0 fs-24 text-white fw-bold" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="ri-close-fill"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <nav class="">
                    <ul class="navbar-nav flex-column pt-2 py-md-0">
                        <?php
                        $menu = wp_get_nav_menu_items('Primary Menu');
                        $requestUrl = ViewHelper::getRequestUrl();
                        foreach ($menu as $item) {
                            $active = str_contains($requestUrl, $item->url) ? 'active' : '';
                            echo '<li class="nav-item">';
                            echo "<a class=\"nav-link $active\" href=\"$item->url\">$item->title</a>";
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="content container p-3 my-32">

                        