<div class="share-container">
    <!-- Share Trigger Button -->
    <button class="share-trigger-btn" onclick="toggleShareMenu()">
        <div class="share-title">
            Share
        </div>
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
    </button>

    <!-- Share Dropdown Menu -->
    <div class="share-dropdown" id="shareDropdown">
        <ul>
            <!-- Copy Article Link -->
            <li onclick="copyLink()">
                <a href="#" class="share-option">
                    <i class="fas fa-link"></i> Copy article link
                </a>
            </li>
            <!-- Email -->
            <li>
                <a href="mailto:?subject=Check out this post&body=Read it here: <?php echo urlencode(get_permalink()); ?>" class="share-option">
                    <i class="fas fa-envelope"></i> Email
                </a>
            </li>
            <!-- Share on Facebook -->
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-option">
                    <i class="fab fa-facebook"></i> Share on Facebook
                </a>
            </li>
            <!-- Share on X/Twitter -->
            <li>
                <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-option">
                    <i class="fab fa-x-twitter"></i> Share on X
                </a>
            </li>
            <!-- Share on LinkedIn -->
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-option">
                    <i class="fab fa-linkedin"></i> Share on LinkedIn
                </a>
            </li>
            <!-- Share on Reddit -->
            <li>
                <a href="https://www.reddit.com/submit?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-option">
                    <i class="fab fa-reddit"></i> Share on Reddit
                </a>
            </li>
            <!-- Share on WhatsApp -->
            <li>
                <a href="https://wa.me/?text=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-option">
                    <i class="fab fa-whatsapp"></i> Share on WhatsApp
                </a>
            </li>
        </ul>
    </div>
</div>