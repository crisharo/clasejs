<!-- Add Modal HTML at the end of the file -->
<div id="subscribeModal" class="modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        
        <div class="logo-container">
        <span class="logo-subscribe"></span></div>

        <div class="subscribe-container">
            <?php echo do_shortcode('[noptin-form id=6282]'); ?>

            <div class="social-links">
                <a href="https://twitter.com/daikamaweb" class="social-link" target="_blank" rel="noopener">
                    <i class="fa-brands fa-x-twitter"></i>
                    <span>Twitter</span>
                </a>
                <a href="https://youtube.com/@daikama" class="social-link" target="_blank" rel="noopener">
                    <i class="fa-brands fa-youtube"></i>
                    <span>YouTube</span>
                </a>
                <a href="<?php bloginfo('rss2_url'); ?>" class="social-link" target="_blank" rel="noopener">
                    <i class="fa-solid fa-rss"></i>
                    <span>RSS Feed</span>
                </a>
            </div>
        </div>

    </div>
</div>