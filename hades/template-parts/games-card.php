<div class="game-card bg-white shadow border-gray border-radius-5">
            
    <div class="section-separator border-bottom">
        <div class="description"><?php _e('Game Information', 'theme_translation'); ?></div>            
    </div>

    <div class="games-info">
        <div class="games-info-section">
            <span class="games-info-title">Release:</span>
            <span class="games-info-value">
            <?php if( get_field('release_date') ): ?>
                <?php echo esc_html ( get_field( 'release_date' ) ); ?>
            <?php else : ?>
                TBA
            <?php endif;?>
            </span>
        </div>
        <div class="games-info-section">
            <span class="games-info-title">Website:</span>
            <?php if ( $site = get_field( 'website' ) ) : ?>
                <?php
                $site = str_replace(array('http://www.', 'https://www.', 'https://', 'http://' ), '', $site);
                $site = rtrim($site, '/');
                $url = get_field( 'website' );?>
                <a class="link" href="<?php echo $url ?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo $site ?></a>
            <?php endif; ?>
        </div>

        <div class="games-info-section">
            <span class="games-info-title">Social:</span>
            <?php if( get_field('facebook') ): ?>
            <a class="link" href="<?php echo wp_kses_post( get_field('facebook') ); ?>" rel="nofollow noopener noreferrer" target="_blank">Facebook</a>
            <?php endif;?>        
            
            <?php if( get_field('twitter') ): ?>
            <a class="link" href="<?php echo wp_kses_post( get_field('twitter') ); ?>" rel="nofollow noopener noreferrer" target="_blank">X/Twitter</a>
            <?php endif;?>        
            
            <?php if( get_field('discord') ): ?>
            <a class="link" href="<?php echo wp_kses_post( get_field('discord') ); ?>" rel="nofollow noopener noreferrer" target="_blank">Discord</a>
            <?php endif;?>
        </div>
    </div>

    <div class="section-separator border-bottom">
        <div class="description"><?php _e('Region', 'theme_translation'); ?></div>            
    </div>
    
    <div class="game-region">
        <?php
            $field = get_field_object('regions');
            $regions = $field['value'];
            if( $regions ): ?>
                <ul>
                    <?php foreach( $regions as $region ): ?>
                        <li><?php echo $field['choices'][ $region ]; ?></li>
                    <?php endforeach; ?>
                </ul>
        <?php endif; ?>
    </div>
    
    <div class="section-separator border-bottom">
        <div class="description"><?php _e('Download Links', 'theme_translation'); ?></div>            
    </div>
    
    <div class="download-links">
        <?php
        $download_links = [
            'android_link' => ['class' => 'download-android', 'label' => __('Android', 'theme_translation')],
            'apple_link' => ['class' => 'download-ios', 'label' => __('Apple', 'theme_translation')],
            'apk_link' => ['class' => 'download-apk', 'label' => __('APK', 'theme_translation')],
            'pc_link' => ['class' => 'download-windows', 'label' => __('Windows', 'theme_translation')],
            'nintendo_link' => ['class' => 'download-nintendo', 'label' => __('Nintendo', 'theme_translation')],
        ];
        
        foreach ($download_links as $field_key => $link_data) {
            $field_value = get_field($field_key);
            if ($field_value) {
                echo '<a href="' . esc_url($field_value) . '" rel="nofollow noopener noreferrer" target="_blank">';
                echo '<span class="' . esc_attr($link_data['class']) . '"></span>';
                echo '<span>' . esc_html($link_data['label']) . '</span>';
                echo '</a>';
            }
        }
        ?>
    </div>

    <div class="disclaimer">
        <?php _e('Game and download may not be available in other regions. "Pre-register" games may be in Beta or Alpha stage. Each region may have its own servers.', 'theme_translation'); ?>
    </div>

</div>