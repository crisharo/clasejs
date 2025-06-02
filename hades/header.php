<!DOCTYPE html>
<html lang="en-US" prefix="og: https://ogp.me/ns#">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body>

<div class="header shadow border-bottom">
    <div class="flex-horizontal-ex header-container">
        <div class="item flex-horizontal">
            <div class="menu-toggle" id="toggleMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a>
        </div>
        <nav class="menu-container">
            <div class="search-wrapper">
                <button class="search-icon" id="searchToggle">
                    <i class="fa-solid fa-magnifying-glass w20"></i>
                </button>
                <div class="search-dropdown" id="searchDropdown">
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <input type="search" class="search-input" placeholder="Search..." name="s" required>
                        <button type="submit" class="search-submit">
                            Go
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="main-grid"><!-- Start of main-grid -->
    <?php get_template_part('menu/menu-index'); ?>
    <div class="wide-full-width" id="main-container">
        <?php get_template_part('menu/menu-games-top'); ?>