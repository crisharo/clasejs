<?php get_template_part('template-parts/box-subscribe'); ?>
<div class="footer border-top shadow">
    <div class="footer-container wide-big">
        <div class="section">
            <div class="logo"></div>
            <div class="social">
                <a href="https://twitter.com/daikamaweb" class="social-link" target="_blank" rel="noopener">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.863 3.55H20.8L14.323 10.893L22 20.447H15.767L11.065 14.567L5.737 20.447H2.8L9.719 12.627L2.333 3.55H8.714L13 8.931L17.863 3.55ZM16.567 18.697H18.4L7.833 5.183H5.867L16.567 18.697Z" fill="currentColor"/>
                    </svg>
                </a>
                <a href="https://www.youtube.com/@daikama" class="social-link" target="_blank" rel="noopener">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
        <div class="section">
            <div class="footer-description">
                At Daikama, we are passionate about providing relevant information on mobile gaming news. You can read more in our <a href="/about/">About Page</a>. If you're a developer and want your game featured on our platform, visit our <a href="/contact/">contact page</a> and send us your proposal. Let's build a more connected gaming community together.
            </div>
        </div>
        <div class="section">
            <div class="copyright">
                <span class="flex-horizontal">
                    <span>
                    2025 © DAIKAMA
                    <?php if ( is_user_logged_in() ) : ?> - 
                    <?php echo get_num_queries(); ?>/<?php timer_stop(1); ?>
                    <?php endif; ?>
                    </span>
                    <span>
                        <ul class="footer-links-horizontal">
                            <li><a href="/terms-of-use/" rel="nofollow" class="footer-link">Terms of Use</a></li>
                            <li><a href="/cookies/" rel="nofollow" class="footer-link">Cookies</a></li>
                            <li><a href="/privacy/" rel="nofollow" class="footer-link">Privacy Policy</a></li>
                        </ul>
                    </span>
                </span>
                <span>
                    Developed by <a href="https://cristianharo.com" rel="noopener nofollow" class="author">cristianharo.com</a>
                </span> 
            </div>
        </div>
    </div>
</div>

</div><!-- End of Full Width -->
</div><!-- End of main-grid -->
<?php wp_footer(); ?>
</body>
</html>