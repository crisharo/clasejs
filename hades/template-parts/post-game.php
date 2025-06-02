<div class="game-card-archive shadow border-radius-5 border-gray bg-white">
    <div class="preview">
        <?php 
        $icon = get_field('icon');
        if( !empty( $icon ) ): ?>
        <img src="<?php echo esc_url($icon['url']); ?>" title="<?php echo esc_attr($icon['alt']); ?>" alt="img" draggable="false">
        <?php endif; ?>
    </div>
    <div class="data">
        <div class="game-title">
            <a href="<?php the_permalink(); ?>">
            <?php the_title()?>
            </a>
        </div>
        <?php $status = get_field( 'status' );
        if( !empty( $status ) ): ?>
        <span class="label color-<?php echo esc_attr($status['value']); ?>">
        <?php echo esc_html($status['label']); ?></span>
        <?php endif; ?>
    </div>                
</div>